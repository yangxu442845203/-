<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //列表
        $adminuser=DB::table("admin_users")->paginate(2);
        //加载模板
        return view("Admin.Adminuser.index",['adminuser'=>$adminuser]);
    }
    //分配权限
    public function adminuserrole($id){
        //获取用户的信息
        $info=DB::table("admin_users")->where("id","=",$id)->first();
        //获取所有角色信息
        $role=DB::table("role")->get();
        //获取当前登录用户角色信息
        $data=DB::table("user_role")->where("uid","=",$id)->get();
        if(count($data)){
            foreach($data as $key=>$value){
              //$rids 是登录用户的所有角色ID
              $rids[]=$value->rid;  
            }
            //加载分配角色模板
            return view("Admin.Adminuser.role",['info'=>$info,'role'=>$role,'rids'=>$rids]);
        }else{
            return view("Admin.Adminuser.role",['info'=>$info,'role'=>$role,'rids'=>array()]);
        }
        
    }
    //保存角色
    public function saverole(Request $request){
        //把选中的的新角色插入到user_role
        //获取用户id
        $uid=$request->input("uid");
        //echo $uid;
        //获取分配角色
        $rids=$_POST['rids'];
        //把当前用户的角色信息删除掉
        DB::table("user_role")->where("uid","=",$uid)->delete();
        //入库
        foreach($rids as $key=>$value){
            $data['uid']=$uid;
            $data['rid']=$value;
            DB::table("user_role")->insert($data);
        }
        return redirect("/adminusers")->with("success","角色分配成功");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加
        return view("Admin.Adminuser.add");
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
        $data=$request->except(['_token']);
        //密码加密
        $data['password']=Hash::make($data['password']);
        //执行数据库的插入
        if(DB::table("admin_users")->insert($data)){
        	//echo "ok";
        	return redirect("/adminusers")->with("success","添加成功");
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
        //
    }
}
