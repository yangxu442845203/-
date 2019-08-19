<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    //写出与Userinfo模型类对应的数据表user_info
    protected $table = "address";
    //模型自动维护时间戳 false 不开启  true 开启
    public $timestamps = false;
    //主键 
    protected $primaryKey="id";
}
