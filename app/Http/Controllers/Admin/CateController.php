<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCates(){
        $cate = DB::table("cates")->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy("paths")->get();
        //遍历
        foreach($cate as $key=>$value){
            //echo $value->path."<br>";
            //把字符串转换为数组
            $arr = explode(",",$value->path);
            //var_dump($arr);
            //获取逗号个数
            $len = count($arr)-1;
            //重复字符串 str_repeat
            $cate[$key]->name = str_repeat("--|",$len).$value->name;
        }
        return $cate;
    }
    public function index(Request $request)
    {
        $k=$request->input("keywords");
        //$cate = DB::table("cates")->where("name","like","%".$k."%")->paginate(5);
        //$cate = DB::select("SELECT *,concat(path,',',id)as paths FROM `cates` order by paths");
        //调整类别顺序 连贯方法
        $cate = DB::table("cates")->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy("paths")->where("name","like","%".$k."%")->paginate(5);
        //遍历
        foreach($cate as $key=>$value){
            //echo $value->path."<br>";
            //把字符串转换为数组
            $arr = explode(",",$value->path);
            //var_dump($arr);
            //获取逗号个数
            $len = count($arr)-1;
            //重复字符串 str_repeat
            $cate[$key]->name = str_repeat("--|",$len).$value->name;                  
        }
        //dd($cate);
        
        //列表
        return view("Admin.Cate.index",['cate'=>$cate,'request'=>$request->all(),'k'=>$k]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加页面
        //echo "ok";
        //获取所有分类
        // $cates = DB::table("cates")->get();
        $cates =  $this->getCates();
        //加载界面
        return view("Admin.Cate.add",['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
        // dd($request->all());
        $data = $request->except(['_token']);
        //获取pid
        $pid = $request->input("pid");
        if($pid==0){
            //添加顶级分类
            // dd($data);
            $data['path']='0';
            //dd($data);
        }else{
            //添加子类
            //拼接path=>父类path和父类id拼接成字段
            //获取父类信息
            $info = DB::table("cates")->where("id","=",$pid)->first();
            $data['path']=$info->path.",".$info->id;
            //dd($data);
        }

        if(DB::table("cates")->insert($data)){
            //echo "ok";
            return redirect("/admincates")->with("success","添加成功");
        }else{
            //echo "error";
            return back()->with("error","添加失败");
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
        //判断删除类别下是否有子类
        //获取当前分类下的子类个数
        $s = DB::table("cates")->where("pid","=",$id)->count();
        //echo $s;
        if($s>0){
            return redirect("/admincates")->with("error","请先删除旗下子分类");
        }

        //直接删除
        if(DB::table('cates')->where("id","=",$id)->delete()){
            return redirect("/admincates")->with("success","删除成功");
        }else{
            return redirect("/admincates")->with("error","删除失败");
        }
    }
}
