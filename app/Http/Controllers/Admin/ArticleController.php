<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Config;
use Intervention\Image\ImageManager;
use App\Services\OSS;//导入OSS类
use Illuminate\Support\Facades\Redis;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        //把列表数据存储在redis缓存里
        //存储所有的列表数据
        $arts=[];
        //哈希表名 存储列表数据
        $hashkey="Hash:php217article";
        //链表名字 存储id
        $listkey="List:php217articlelist";
        //判断redis里有没有缓存数据
        if(Redis::exists($listkey)){
            //获取缓存服务器下的文章id
            $lists=Redis::lrange($listkey,0,-1);
            // dd($lists);
            // 遍历id
            foreach($lists as $k=>$v){
              $arts[]=Redis::hgetall($hashkey.$v); 
            }
        }else{
           //获取数据库的数据 给redis一份
           $arts=Article::get()->toArray();
           //给redis一份
           foreach($arts as $k=>$v){
            //将文章的id存储在$listkey 链表里
            Redis::rpush($listkey,$v['id']);
            //将所有的字段数据插入到哈希表里
            Redis::hmset($hashkey.$v['id'],$v);
           }
        }
        
        return view("Admin.Article.index",['data'=>$arts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Article.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        // dd($request->all());
        //普通的添加
        //检测是否具有文件
        // if($request->hasFile("thumb")){
        //     //名字
        //     $name=time();
        //     $ext=$request->file("thumb")->getClientOriginalExtension();
        //     //把文件移动到upload下
        //     $request->file("thumb")->move(Config::get('app.app_upload'),$name.".".$ext);
        // }
        // //实例化ImageManager
        // $manager = new ImageManager();
        // //做图片的裁剪
        // $manager->make(Config::get('app.app_upload')."/".$name.".".$ext)->resize(150,150)->save(Config::get('app.app_upload')."/"."r_".$name.".".$ext);
        // //数据入库
        // $data['title']=$request->input("title");
        // $data['editor']=$request->input("editor");
        // $data['thumb']=trim(Config::get('app.app_upload')."/"."r_".$name.".".$ext,'.');
        // $data['descr']=$request->input("descr");
        // // dd($data);
        // if(Article::create($data)){
        //     return redirect("/adminarticle")->with("success","添加成功");
        // }else{
        //     return back();
        // }

        //阿里云oss 做存储
        //检测是否具有文件
        if($request->hasFile("thumb")){
            //获取上传文件信息
            $file=$request->file("thumb");
            // dd($file);
            //名字
            $name=time();
            $ext=$request->file("thumb")->getClientOriginalExtension();
            
        }
        //$newfile 文件上传到oss服务器里的名字  $filepath上传文件零时资源目录
        $newfile=$name.".".$ext;
        $filepath=$file->getRealPath();
        OSS::upload($newfile, $filepath);
        // die;
       $dir =Config::get('app.app_upload');
       //dd($dir);
        if(!file_exists($dir)){
            mkdir($dir);
        }

         //实例化ImageManager
        $manager = new ImageManager();

        //做图片的裁剪
        $manager->make(env('ALURL').$newfile)->resize(150,150)->save(Config::get('app.app_upload')."/"."r_".$name.".".$ext);
    
        //数据入库
        $data['title']=$request->input("title");
        $data['editor']=$request->input("editor");
        $data['thumb']=trim(Config::get('app.app_upload')."/"."r_".$name.".".$ext,'.');
        $data['descr']=$request->input("descr");
        $data1=Article::create($data);
        $id =$data1->id;
         if($id){
            //把需要添加的数据插入到redis缓存服务器里
            //哈希表名 存储列表数据
            $hashkey="Hash:php217article";
            //链表名字 存储id
            $listkey="List:php217articlelist";
            //id 存储 =》链表
            Redis::rpush($listkey,$id);
            //数据=》哈希表里
            $data['id']=$id;
            Redis::hmset($hashkey.$id,$data);
            return redirect("/adminarticle")->with("success","添加成功");
        }else{
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	//获取需要修改的数据
        $article=DB::table("articles")->where("id","=",$id)->first();
        return view("Admin.Article.edit",['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取修改数据
        $data=$request->except(['_token','_method']);
        if(DB::table("articles")->where("id","=",$id)->update($data)){
            return redirect("/adminarticle")->with("success","修改成功");
        }else{
            return back()->with("error","修改失败");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Ajax 删除
    public function del(Request $reqeust){
        // echo "111";

        $arr=$reqeust->input("arr");
        if($arr==""){
            echo "请至少选择一条数据";die;
        }
        // echo json_encode($arr);
        //遍历
        foreach($arr as $key=>$value){
            Article::where("id","=",$value)->delete();
            //哈希表名 存储列表数据
            $hashkey="Hash:php217article";
            //链表名字 存储id
            $listkey="List:php217articlelist";
            //删除缓存服务器的数据
            //删除链表里的id
            Redis::lrem($listkey,1,$value);
            //删除的是哈希表里的数据
            Redis::del($hashkey.$value);
        }

        echo 1;
    }
}
