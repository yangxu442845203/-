<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Config;
use Intervention\Image\ImageManager;
use App\Services\OSS;//导入OSS类
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //列表
        $data=Article::get();
        return view("Admin.Article.index",['data'=>$data]);
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
        //实例化ImageManager
        $manager = new ImageManager();
        //做图片的裁剪
        $manager->make(env('ALIURL').$newfile)->resize(150,150)->save(Config::get('app.app_upload')."/"."r_".$name.".".$ext);
        //数据入库
        $data['title']=$request->input("title");
        $data['editor']=$request->input("editor");
        $data['thumb']=trim(Config::get('app.app_upload')."/"."r_".$name.".".$ext,'.');
        $data['descr']=$request->input("descr");
        // dd($data);
        if(Article::create($data)){
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
        //
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
        //
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
        }

        echo 1;
    }
}
