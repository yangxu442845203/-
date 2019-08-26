<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取session
        $cart=session("cart");
        //总计变量
        $tot=0;
        //总件数
        $sum=0;
        $data1=array();
        if(!empty($cart)){
            //遍历
            foreach($cart as $key=>$value){
                //获取购买商品的信息
                $info=DB::table("shops")->where("id","=",$value['id'])->first();
                $data['id']=$value['id'];//id
                $data['num']=$value['num'];//数量
                $data['name']=$info->name;//name
                $data['pic']=$info->pic;//pic
                $data['price']=$info->price;//price
                $tot+=$data['num']*$data['price'];
                $sum+=$data['num'];

                $data1[]=$data;

            }

        }
        // dd($data1);
        //加载购物车的模板
        return view("Home.Cart.index",['data'=>$data1,'tot'=>$tot,'sum'=>$sum]);
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
    //购物车去重操作 $id 当前要购买的商品id
    public function checkExists($id){
        //获取购物车的数据
        $goods=session("cart");
        //判断购物车里有没有数据
        if(empty($goods)) return false;
        //遍历
        foreach($goods as $key=>$value){
            if($value['id']==$id){
                //购物车里有当前要购买的商品数据
                return true;
            }
        }
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data=$request->except(['_token']);
        if(!$this->checkExists($data['id'])){
            //把购买的每一件商品添加到session数组里
            $request->session()->push('cart',$data);
        }
        
        //跳转到购物车界面
        return redirect("/homecart");
    }

    //全部删除
    public function alldelete(Request $request){
        $request->session()->pull("cart");
        return redirect("/homecart");
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
        $cart=session("cart");
        //遍历
        foreach($cart as $key=>$value){
            if($value['id']==$id){
                //删除当前商品数据
                unset($cart[$key]);
            }
        }

        //session重新赋值
        session(['cart'=>$cart]);

        return redirect("/homecart");
        

    }
    //减操作
      public function cartupdatee(Request $request)
    {
        $id=$request->input("id");
        $info=DB::table("shops")->where("id","=",$id)->first();
        // echo $id;
        //获取session数据
        $data=session("cart");
        //遍历
        foreach($data as $key=>$value){
            //判断
            if($value['id']==$id){
                //数量减一
                $data[$key]['num']-=1;
                if($data[$key]['num']<=1){
                    $data[$key]['num']=1;
                }

                session(['cart'=>$data]);
                // echo $data[$key]['num'];
                $data1['num']=$data[$key]['num'];
                $data1['tot']=$data[$key]['num']*$info->price;
                echo json_encode($data1);

            }
        }
    }

    //加操作
    public function cartupdate(Request $request){
        $id=$request->input("id");
        $info=DB::table("shops")->where("id","=",$id)->first();
        // echo $id;
        $data=session('cart');
        //遍历
        foreach($data as $key=>$value){
            if($value['id']==$id){
                //数量加一
                $data[$key]['num']+=1;
                if($data[$key]['num']>=$info->num){
                    $data[$key]['num']=$info->num;
                }
                session(['cart'=>$data]);
                $data1['num']=$data[$key]['num'];
                $data1['tot']=$data[$key]['num']*$info->price;
                echo json_encode($data1);

            }
        }
    }

    //计算总件数和总价格
    public function homecarttot(){
        if(isset($_GET['arr'])){
        //总计价格
        $sum=0;
        //总件数
        $nums=0;
        //遍历  $value1 选中数据的id
        foreach($_GET['arr'] as $value1){
            //获取购物车的session数据
            $data=session("cart");
            //遍历
            foreach($data as $key=>$value){
                //判断
                if($value['id']==$value1){
                    //获取单价和数量
                    $num=$data[$key]['num'];
                    //获取商品数据
                    $info=DB::table("shops")->where("id","=",$value1)->first();
                    $price=$info->price;
                    $tot=$num*$price;
                    $sum+=$tot;
                    $nums+=$num;
                }
            }
        }
        $data2['nums']=$nums;
        $data2['sum']=$sum;
        echo json_encode($data2);
    }else{
	       //给总计和总件数赋值为0
	       $data2['nums']=0;
	       $data2['sum']=0;
	       echo json_encode($data2); 
    	}
    }
}
