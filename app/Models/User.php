<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //写出与User模型类对应的数据表user
    protected $table = "user";
    //模型自动维护时间戳 false 不开启  true 开启
    public $timestamps = true;
    //可以被批量赋值的属性 在使用模型添加的时候必须设置该属性否则添加不成功
    protected $fillable = ['name','password','email','status','token','phone'];

    //修改器 可以自动转换获取数据字段的值 Status 字段名
    public function getStatusAttribute($value){
		$status=[1=>"禁用",0=>"未激活",2=>"激活"];
		return $status[$value];
	}

	//通过User模型类和Userinfo模型类的关系获取当前会员下的会员信息
	public function info(){
		//App\Models\Userinfo 关联Userinfo模型类  user_id 关联字段
		return $this->hasOne("App\Models\Userinfo","user_id");
	}

	//通过User模型类和Useraddress模型类关系获取当前会员下的所有收货地址
	public function address(){
		//App\Models\Useraddress 地址模型类 关联Useraddress模型类  user_id 关联字段
		return $this->hasMany("App\Models\Useraddress","user_id");
	}
}
