<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     //写出与User模型类对应的数据表user
    protected $table = "articles";
    //模型自动维护时间戳 false 不开启  true 开启
    public $timestamps = false;
    //可以被批量赋值的属性 在使用模型添加的时候必须设置该属性否则添加不成功
    protected $fillable = ['title','descr','editor','thumb'];
}
