<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersInsert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //给表单校验请求类授权
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //名字的规则 required不能为空的规则
            "username"=>"required|regex:/\w{6,8}/|unique:users",
            //密码的规则
            "password"=>"required|regex:/\w{6,18}/",
            //确认密码规则
            "repassword"=>"required|same:password",
            //邮箱的规则
            "email"=>"required|email|unique:users",
            //电话的规则
            "phone"=>"required|regex:/\d{11}/|unique:users",
        ];
    }
    //自定义错误消息
    public function messages(){ 
    	return[
    	//显示名字字段的自定义错误消息
    	"username.required"=>"用户名不能为空", 
    	"username.regex"=>"名字必须是6-8位的数字,字母,下划线",
    	"username.unique"=>"名字不能重复",
    	"password.required"=>"密码不能为空", 
    	"password.regex"=>"密码必须是6-18位",
    	"repassword.required"=>"确认密码不能为空", 
    	"repassword.same"=>"两次密码不一致",
    	"email.email"=>"邮箱不符合格式",
    	"email.required"=>"邮箱不能为空", 
    	"email.unique"=>"邮箱不能重复",
    	"phone.required"=>"电话不能为空", 
    	"phone.regex"=>"电话必须是11位",
    	"phone.unique"=>"电话不能重复",
    	];
    } 
}
