<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取角色
        $role=DB::table("role")->get();
        return view("Admin.Role.index",['role'=>$role]);
    }
    //分配权限
    public function adminauth($id){
    	//获取角色信息
    	$role = DB::table("role")->where("id","=",$id)->first();
    	//获取所有的权限
    	$auth = DB::table("node")->get();
    	//获取当前角色的权限信息
    	$data = DB::table("role_node")->where("rid","=",$id)->get();
    	if(count($data)){
    		foreach($data as $key=>$value){
    			$nids[]=$value->nid;
    		}
    		return view("Admin.Role.auth",['role'=>$role,'auth'=>$auth,'nids'=>$nids]);
    	}
    	//echo $id;
    	return view("Admin.Role.auth",['role'=>$role,'auth'=>$auth,'nids'=>array()]);
    }
    //保存权限
    public function saveauth(Request $request){
    	$rid=$request->input("rid");
    	//echo $rid;
    	//获取分配的权限
    	$nids=$_POST['nids'];
    	//dd($nids);
    	//删除当前角色之前的权限信息
    	DB::table("role_node")->where("rid","=",$rid)->delete();
    	//入库
    	foreach($nids as $key=>$value){
    		$data['nid']=$value;
    		$data['rid']=$rid;
    		DB::table("role_node")->insert($data);
    	}

    	return redirect("/role")->with("success","权限分配成功");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
