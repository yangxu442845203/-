<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //获取城市级联数据
    public function address(Request $request){
        $upid=$request->input('upid');
        $address=DB::table("district")->where("upid","=",$upid)->get();
        echo json_encode($address);
    } 

     public function insert(Request $request)
    {
        //dd($request->all());
        $data['name']=$request->input("name");
        $data['phone']=$request->input("phone");
        $data['user_id']=session("user_id");
        $data['xhuo']=$request->input("xhuo");

        if(DB::table("address")->insert($data)){
            return back();
        }

    }

    //获取当前用户所有的收货地址
    public  static function alladdress($userid){
        $alladdress=DB::table("address")->where("user_id","=",$userid)->get();
        return $alladdress;
    }

    //切换收货地址
    public function choose(Request $request){
        $id=$request->input("address_id");
        $address=DB::table("address")->where("id","=",$id)->first();
        echo json_encode($address);
    }

    public function index()
    {
        //
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
