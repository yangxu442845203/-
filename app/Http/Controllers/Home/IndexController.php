<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   	//无限分类递归数据遍历
    public static function getCatesByPid($pid){
        //获取数据
        $cate=DB::table("cates")->where("pid","=",$pid)->get();
        $data=[];
        //遍历
        foreach($cate as $key=>$value){
            //把子类信息写在父类SUV的下标了
            $value->suv=self::getCatesByPid($value->id);
            $data[]=$value;
        }
        return $data;
    }

    public function index()
    {
    	$lunbotu=DB::table("lunbotu")->get();
        $youqing=DB::table("youqing")->get();
        //dd($youqing);
        $cate = self::getCatesByPid(0);
        //获取所有的顶级分类
        $cates=DB::table("cates")->where("pid","=",0)->get();
        //遍历顶级分类
        foreach($cates as $row){
            //把获取的到当前顶级分类下的商品存储在数组里
            $shop[]=DB::table("shops")->join("cates","shops.cate_id","=","cates.id")->select("cates.name as cname","cates.id as cid","shops.name as sname","shops.id as sid","shops.price","shops.pic")->where("shops.cate_id","=",$row->id)->get();
        }
        //dd($cates);
        //加载模板
        return view("Home.Index.index",['cates'=>$cate,'shop'=>$shop,'youqing'=>$youqing,'lunbotu'=>$lunbotu]);
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
        //加载详情页
        // echo $id;
        $shop=DB::table("shops")->where("id","=",$id)->first();
        return view("Home.Index.info",['info'=>$shop]);
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

    //退出
    public function logout(Request $request){
        $request->session()->pull("email");
        $request->session()->pull("user_id");
        // $request->session()->pull('cart');
        // $request->session()->pull('goods');
        //登录
        return redirect("/homelogin/create");
    }

}
