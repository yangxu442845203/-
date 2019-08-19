<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //退出
        //销毁session
        $request->session()->pull("adminname");
        $request->session()->pull("nodelist");
        //销毁完事跳转登录页面
        return redirect("/adminlogin/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载后台登录模板
        return view("Admin.Adminlogin.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
       //获取登录的管理员名字和密码
       $name=$request->input("name");
       $password=$request->input("password");
       //检测管理员名字
       $info = DB::table('admin_users')->where("name","=",$name)->first();
       if($info){
        //echo "name is ok";
        //检测密码
        if(Hash::check($password,$info->password)){
            //设置用户登录的session
            session(['adminname'=>$name]);
            
            //1.获取后台登录用户的权限信息
            $list=DB::select("select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and uid={$info->id}");
            //dd($list);
            //2.初始化权限 让所有的后台管理员都具有后台首页的权限
            $nodelist['AdminController'][]="index";
            foreach($list as $key=>$value){
                //把当前登录的用户权限写入到$nodelist里
                $nodelist[$value->mname][]=$value->aname;
                //如果有create方法 需要添加store方法
                 if($value->aname=="create"){
                    $nodelist[$value->mname][]="store";
                 }               
                //如果有edit方法 需要添加update方法
                if($value->aname=="edit"){
                    $nodelist[$value->mname][]="update";
                 }
            }
            //dd($nodelist);
            //3.把当前登录用户的所有权限信息存储在session里
            session(['nodelist'=>$nodelist]);

          //直接跳转到后台首页
            return redirect("/admin")->with("success","登录成功");
        }else{
            return back()->with("error","密码有误");
        }
       }else{
        return back()->with("error","管理员有误");
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
}
