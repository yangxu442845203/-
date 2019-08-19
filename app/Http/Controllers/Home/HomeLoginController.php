<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Mail;
class HomeLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view("Home.HomeLogin.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取登录的邮箱和密码
        $email=$request->input("email");
        $password=$request->input("password");
        //检测$email
        $info=User::where("email","=",$email)->first();
        // dd($info);
        if($info){
            // echo "ok";
            //检测密码
            if(Hash::check($password,$info->password)){
                // echo "ok";
                //检测用户是否激活
                if($info->status=='激活'){
                    return redirect("/homeindex");
                }else{
                    return back()->with("error","用户还没有激活");
                }
            }else{
                 return back()->with("error","密码有误");
            }
        }else{
            return back()->with("error","邮箱有误");
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

    //发送邮找回密码 $id 用户id  $email 要激活的用户邮箱 $token 校验参数
    public function loginmail($id,$email,$token){
        //闭包函数内部直接获取不到闭包函数外部的变量 
        //use 把闭包函数外部的变量直接引入到闭包函数内部
        Mail::send("Home.HomeLogin.reset",['id'=>$id,'token'=>$token],function($message)use($email){
            $message->to($email);
            $message->subject("重置密码");

        });

        return true;
    }

    //加载忘记密码的模板
     public function forget(){
        return view("Home.HomeLogin.forget");
     }

     public function doforget(Request $request){
        //发送邮件找回密码
        $email=$request->input("email");
        //获取数据库的数据
        $info=User::where("email","=",$email)->first();
        if($this->loginmail($info->id,$email,$info->token)){
            return redirect("https://mail.qq.com/");
        }
     }

     public function reset(Request $request){
        $id=$request->input("id");
        $token=$request->input("token");
        //获取数据库的数据
        $info=User::where("id","=",$id)->first();
        // echo $id.":".$token;
        //直接跳转到重置密码模板
        //对比token
        if($token==$info->token){
            return view("Home.HomeLogin.reset1",["id"=>$id]);
        }

     }

     public function doreset(Request $request){
        //密码的修改
        $id=$request->input("id");
        $password=$request->input("password");
        //执行修改
        $data['password']=Hash::make($password);
        //重置token的值
        $data['token']=str_random(50);
        if(User::where("id","=",$id)->update($data)){
            return redirect("/homelogin/create");
        }
     }

     public function qqq()
     {
     	echo "123";
     }


}
