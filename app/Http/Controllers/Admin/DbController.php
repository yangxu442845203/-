<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入数据库操作类
use DB; 

class DbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //whereIn 获取区间值
        $res = DB::table("stu") ->whereIn("id", [1, 2, 3])->get();
        //获取stu表数据 降序排列
        $data=DB::table("stu")->orderBy("id","desc")->get();
        //分页 2代表每页数据条数
        $data1=DB::table("stu")->paginate(2);
        //两表关联 class 和 brand
        $data2=DB::table("class")->join("brand","class.id","=","brand.class_id")->get();
        //三表关联 class brand shop
        $data3 = DB::table("class")->join("brand","class.id","=","brand.class_id")->join("shop","brand.id","=","shop.brand_id")->get();
        //获取两表关联里的 class 的 name字段值, brand的name值 
        //$data4 = DB::table("class")->join("brand","class.id","=","brand.class_id")->select("class.name as cname","brand.name as bname")->get();
        //获取三表关联里的 class 的 name字段值, brand的name值  shop的role值
        $data5 =  DB::table("class")->join("brand","class.id","=","brand.class_id")->join("shop","brand.id","=","shop.brand_id")->select("class.name as cname","brand.name as bname","shop.role")->get();
        //获取数据的总条数
        $tot = DB::table("stu")->count();
        //获取字段的最大值
        $id = DB::table("stu")->max("id");
        //获取id一列的平均值
        $avgid = DB::table("stu")->avg("id");
        dd($avgid);
        //return view("Admin.Db.index",['res'=>$data1]);
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
