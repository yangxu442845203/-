<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use A; //导入自定义类A
class PayController extends Controller
{
    //调用pay函数
    public function pay(){
    	pay();
    }

    //调用自定义类
    public function sendphone(){
    	//实例化A
    	$a = new A();
    	$a->sendphone();

    }
}
