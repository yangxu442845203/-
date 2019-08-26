<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Config;
use DB;

class LunbotuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lunbotu=DB::table("lunbotu")->get();
        //加载列表
        return view("Admin.Lunbotu.index",['lunbotu'=>$lunbotu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模板
        return view("Admin.Lunbotu.add"); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //检测是否具有文件
        if($request->hasFile("pic")){
            //名字
            $name=time();
            $ext=$request->file("pic")->getClientOriginalExtension();
            //把文件移动到upload下
            $request->file("pic")->move(Config::get('app.app_upload'),$name.".".$ext);
            //实例化ImageManager
            $manager = new ImageManager();
            //做图片的裁剪
            $manager->make(Config::get('app.app_upload')."/".$name.".".$ext)->resize(150,150)->save(Config::get('app.app_upload')."/"."r_".$name.".".$ext);
            $data['pic']=trim(Config::get('app.app_upload')."/"."r_".$name.".".$ext,'.');
        }else{
            return back()->with("error","没有选择图片");
        }
        
        //数据入库
        $data['name']=$request->input("name");
        
        //dd($data);
        if(DB::table("lunbotu")->insert($data)){
            return redirect("/adminlunbotu")->with("success","添加成功");
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
        $user = DB::table("lunbotu")->where("id","=",$id)->first();
        //dd($user);
        return view("Admin.Lunbotu.edit",['user'=>$user]);
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
        //dd($data);
        //检测是否具有文件
        if($request->hasFile("pic")){
            //名字
            $name=time();
            $ext=$request->file("pic")->getClientOriginalExtension();
            //把文件移动到upload下
            $request->file("pic")->move(Config::get('app.app_upload'),$name.".".$ext);
            //实例化ImageManager
            $manager = new ImageManager();
            //做图片的裁剪
            $manager->make(Config::get('app.app_upload')."/".$name.".".$ext)->resize(150,150)->save(Config::get('app.app_upload')."/"."r_".$name.".".$ext);
            $data['pic']=trim(Config::get('app.app_upload')."/"."r_".$name.".".$ext,'.');

        }else{
            return back()->with("error","没有选择图片");
        }
        
        //数据入库
        $data['name']=$request->input("name");
        if(DB::table("lunbotu")->where("id","=",$id)->update($data)){
            return redirect("/adminlunbotu")->with("success","修改成功");
        }else{
            return back();
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
        //删除
        if(DB::table("lunbotu")->where("id","=",$id)->delete()){
            return redirect("/adminlunbotu")->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }
}
