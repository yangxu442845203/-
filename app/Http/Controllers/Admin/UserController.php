<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
//导入模型类
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取总条数
        $tot = User::count();
        //每页显示的数据条数
        $rev=2;
        //获取最大页数
        $maxpage=ceil($tot/$rev);
        for($i=1;$i<=$maxpage;$i++){
            $pp[$i]=$i;
        }
        //获取当前页
        $page=$request->input("page");
        //判断
        if(empty($page)){
            $page=1;
        }
        //获取偏移量
        $offset=($page-1)*$rev;
        //获取当前页数据
        //$sql="select * from user limit $offset,$rev";
        $data=User::offset($offset)->limit($rev)->get();
        // ajax() 如果是Ajax请求返回true 否则返回false
        //判断请求方式
        if($request->ajax()){
            //加载Ajax独立的模板
            return view("Admin.User.page",['data'=>$data]);
            
        }
        
        
        return view("Admin.User.index",['pp'=>$pp,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加
        //echo "this is id";
        //加载模板
        return view("Admin.User.add");
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
        $data=$request->except(['_token']);
        //密码加密
        $data['password']=Hash::make($data['password']);
        $data['status']=1; //1 禁用
        //用模型类插入数据
        if(User::create($data)){
        	return redirect("/adminuser")->with("success","添加成功");
        }else{
        	return redirect("/adminuser")->with("error","添加失败");
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
        $user = User::where("id","=",$id)->first();
        //dd($id);
        return view("Admin.User.edit",['user'=>$user]);
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
        if(User::where("id","=",$id)->update($data)){
        	return redirect("/adminuser")->with("success","修改成功");
        }else{
        	return redirect("/adminuser/$id/edit")->with("error","修改成功");
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
        if(User::where("id","=",$id)->delete()){
        	return redirect("/adminuser")->with("success","删除成功");
        }else{
        	return redirect("/adminuser")->with("success","删除失败");
        }
    }

    //获取会员详情信息  $id=会员id
    public function userinfo($id){
    	//echo $id;
    	$userinfo = User::find($id)->info;
    	//dd($userinfo);
    	//加载视图
    	return view("Admin.User.info",['info'=>$userinfo]);
    }

    //获取会员的收货地址
     public function useraddress($id){
    	//echo $id;
    	//调用模型类的address
    	$useraddress = User::find($id)->address;
    	// dd($useraddress);
    	//加载视图
    	return view("Admin.User.address",['address'=>$useraddress]);
    }
}
