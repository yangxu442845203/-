<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$request 请求对象
        //中间件做数据的过滤
        //检测是否具有用户登录的sessionid
        if($request->session()->has("user_id")){
            //执行下一个请求
            return $next($request);
        }else{
            //跳转到登录页面 redirect 跳转 /login 加载登录模板的路由规则
            return redirect("/login");
        }    
    }
}
