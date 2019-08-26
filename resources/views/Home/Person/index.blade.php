<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="/static/Homes/css/top.css">
<link rel="stylesheet" type="text/css" href="/static/Homes/css/lunbo.css">
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/public.js"></script>
<link rel="stylesheet" type="text/css" href="/static/Homes/css/vipcenter.css">
<link rel="stylesheet" type="text/css" href="/static/Homes/css/footer.css"/>
</head>

<body>
<!--顶部菜单有改动与首页的不一样，请单独调用-->
<div class="dy1"> 
   <div class="dy2"> 
    <ul class="dy3"> 
     <li><a href="#">乐乐官网<br />乐乐官网</a></li> 
     <li><a href="#" id="diyunapp">商城APP<br />商城APP</a></li> 
    </ul> 
    <a href="http://www.php217.com/homecart" class="dy5">购物车</a> 
    <ul class="dy4">
    @if(session("email"))
    	<li><a href="" target="_top" class="h">hello,{{session('email')}}</a></li> 
    	<li><a href="http://www.php217.com/homelogout">退出</a></li>
    @else
     <li><a href="http://www.php217.com/homelogin/create" target="_top" class="h">登录<br />登录</a></li> 
     <li><a href="http://www.php217.com/homeregister/create">注册<br />注册</a></li> 
     @endif
    </ul>  
    <div class="dy9"> 
     <img src="/static/Homes//static/Homes/img/phone.png" /> 
    </div> 
   </div> 
  </div> 
<!--logo加时间加搜索框-->
<div class="dy10">
	<div class="dy11">
    	<img src="/static/Homes/img/logo.png"/>
    </div>
    <div class="dy13">
    	<embed src="/static/Homes/img/honehone_clock_wh.swf" style=" height:45px; width:120px"></embed>
    </div>
    <div class="dy12">
    	<input type="text" value="搜索商品/店铺" onfocus="if(value=='搜索商品/店铺') {value=''}" onblur="if (value=='') {value='搜索商品/店铺'}" style="width:500px; height:36px; text-indent:12px; font-size:12px; color:#666; float:left">
        <input type="search" value="搜索" style=" cursor:pointer; width:70px; height:36px; float:right; text-align:center; background:#333;" class="shousuo">
    </div>
</div>
<!--全部商品分类-->
<div class="qbspfl">
	<div class="djfl">
    	全部商品分类
    </div>
    <div class="morelist">
    	<a href="#">标题一</a>
        <a href="#">标题一</a>
        <a href="#">标题一</a>
        <a href="#">标题一</a>
        <a href="#">标题一</a>
        <a href="#">标题一</a>
    </div>
</div>
<script>
$(function(){
	$("#banner_menu_wrap").mouseleave(function(){
		$(this).hide()
		$("#big_banner_wrap").hide()
		});
	$(".djfl").mouseenter(function(){
		$("#big_banner_wrap").show()
		$("#banner_menu_wrap").show()
		});	
	})
	
</script>
<!--banner轮播引入lunbo.css和daohang.js-->
 
 <script src="js/daohang.js"></script>
<!--个人中心首页 -->
<div class="thetoubu">
	<!--头部-->
	<div class="thetoubu1">
    	<b>
        	<img src="/static/Homes/img/touxiang.png"/>
        </b>
        <em>{{session('email')}}</em>
        <em>欢迎来到会员中心</em>
        <a href="#">地址管理</a>
        <a href="#">修改资料</a>
        <h5>账户安全</h5>
        <strong>低</strong>
        <span>
        	<p style=" width:27%"></p>
        </span>
        <a href="#">安全等级提升</a>
        <em style=" padding-right:2px">手机</em>
        <a href="#" style=" padding-left:2px; float:left; display:block; color:#f00" title="点击绑定">未绑定</a>
        
    </div>
    <!--详细列表-->
    <div class="xiangxilbnm">
    	<!--left-->
        <div class="liefyu">
        	<h2>交易管理</h2>
                <div class="conb">
                <a href="http://www.php217.com/homecart">我的购物车</a>
                <a href="#">收货地址</a>
                </div>
        </div>
        <script type="text/javascript">
		$(function(){//第一步都得写这个
			$(".liefyu h2").click(function(){//获取title，并且让他执行下面的函数
			$(this)/*点哪个就是哪个*/.next(".conb")/*哪个标题下面的con*/.slideToggle()/*打开/折叠*/.siblings/*锁定同级元素*/(".con").slideUp()/*同级元素折叠起来*/
			})
		})
		</script>
        <!--right-->
        <div class="zuirifip">
        <!--lll-->
        	<div class="zuiriftp1">
            	<ul>
                	<li>
                        <span>账户余额</span>
                        <p>￥1000</p>
                    </li>
                    <li>
                    	<span>我的积分</span>
                        <p>1000</p>
                    </li>
                    <li>
                    	<span>我的优惠劵</span>
                        <p><s>2</s>张</p>
                    </li>
                    <li>
                    	<span>我的帝云币</span>
                        <p>0</p>
                    </li>
                </ul>
            </div>
        <!--lll-->
        	<div class="dfdaspjtk">
            	<span style=" display:block; float:left; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666">交易提醒</span>
            	<a href="#" style="color:#09f">待付款&nbsp;<s>1</s></a>
                <a href="#">待收货&nbsp;<s>1</s></a>
                <a href="#">待发货&nbsp;<s>1</s></a>
                <a href="#">待评价&nbsp;<s>1</s></a>
                <a href="#">交易历史&nbsp;<s>1</s></a>
            </div>
            <script>
			$(function(){
				$(".dfdaspjtk a").click(function(){
					$(this).css({color:"#09f"}).siblings().css({color:"#333"})
					})
				})
            </script>
        <!--所有列表-->
            <div class="sydlbdzz">
                <!--一个列表开始-->
                @foreach($person as $row)
                <div class="gzdlbdzzl">
                    <!--左-->
                    <div class="spzhaopin">
                        <a href="#"><img src="{{$row->pic}}"/></a>
                    </div>
                    <!--中-->
                                       	
                   	<div class="youstdongi">
                   		
                        <a href="#"><h5>{{$row->name}}</h5></a>
                        <span>下单时间：2016-6-6&nbsp;14:08</span>
                        <span style=" color:#09f">订单状态：待付款</span>
                        <span>订单金额：<s>￥600</s>                        
                        <s style="color:#666; margin-left:10px">(1)件</s>
                        <s style="color:#666; margin-left:10px">免运费</s>
                        <s style="color:#666; margin-left:10px">在线支付</s>
                        <a style="margin-left:10px">小明的店铺</a>
                        <a style="margin-left:10px">取消订单</a>
                        <a style="color:#F00; cursor:pointer; float:right">删除</a></span>
                    </div>
                    
                    <!--右-->
                    <div class="quzhifubasb">
                        <a href="#">支付订单</a>
                    </div>
                    <!--右下-->
                    <div class="chakanxiangqingfg">
                    	<a href="/homeperson/{{$row->id}}">查看详情</a>
                    </div>
                </div>
                @endforeach
                <!--一个列表结束-->
                
            </div> 
        <!--所有列表结束-->
        <!--我的购物车-->
        	<div class="dfdaspjtk">
            	<span style=" display:block; float:left; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666">我的购物车</span>
                <a href="#" style=" display:block; float:right; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#f90">清空购物车</a>
                <a href="#" style=" display:block; float:right; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#09f">查看购物车内所有商品</a>
            </div>
            <div class="wofrgwcjb">
            	<ul>
                	<li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                </ul>
            </div>
        <!--购物车结束--> 
        <!--我的商品收藏-->
        	<div class="dfdaspjtk">
            	<span style=" display:block; float:left; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666">商品收藏</span>
                <a href="#" style=" display:block; float:right; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#f90">清空收藏</a>
                <a href="#" style=" display:block; float:right; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#09f">查看收藏的所有商品</a>
            </div>
            <div class="wofrgwcjb">
            	<ul>
                	<li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                </ul>
            </div>
        <!--商品收藏结束-->
        <!--我收藏的店铺-->
        	<div class="dfdaspjtk" style=" background:rgba(0,66,255,0.1)">
            	<span style=" display:block; float:left; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666">店铺收藏</span>
                <a href="#" style=" display:block; float:right; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#f90">清空店铺</a>
                <a href="#" style=" display:block; float:right; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#09f">查看收藏的所有店铺</a>
            </div>
            <div class="wotrfrgwcjb">
            	<ul>
                	<li>
                    	<a href="#"><img src="/static/Homes/img/57457e3bN79fa0a40.jpg"/>
                        <h5>天天开心的店铺</h5>
                        </a>	
                    </li>
                    <li>
                    	<a href="#"><img src="/static/Homes/img/57457e3bN79fa0a40.jpg"/>
                        <h5>天天开心的店铺</h5>
                        </a>	
                    </li>
                    <li>
                    	<a href="#"><img src="/static/Homes/img/57457e3bN79fa0a40.jpg"/>
                        <h5>天天开心的店铺</h5>
                        </a>	
                    </li>
                    <li>
                    	<a href="#"><img src="/static/Homes/img/57457e3bN79fa0a40.jpg"/>
                        <h5>天天开心的店铺</h5>
                        </a>	
                    </li>
                    <li>
                    	<a href="#"><img src="/static/Homes/img/57457e3bN79fa0a40.jpg"/>
                        <h5>天天开心的店铺</h5>
                        </a>	
                    </li>
                    <li>
                    	<a href="#"><img src="/static/Homes/img/57457e3bN79fa0a40.jpg"/>
                        <h5>天天开心的店铺</h5>
                        </a>	
                    </li>
                    <li>
                    	<a href="#"><img src="/static/Homes/img/57457e3bN79fa0a40.jpg"/>
                        <h5>天天开心的店铺</h5>
                        </a>	
                    </li>
                    <li>
                    	<a href="#"><img src="/static/Homes/img/57457e3bN79fa0a40.jpg"/>
                        <h5>天天开心的店铺</h5>
                        </a>	
                    </li>
                </ul>
            </div>
        <!--店铺收藏结束-->
         <!--我的足迹-->
        	<div class="dfdaspjtk" style=" background:rgba(0,66,255,0.1)">
            	<span style=" display:block; float:left; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666">我的足迹</span>
                <a href="#" style=" display:block; float:right; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#f90">清空历史</a>
                <a href="#" style=" display:block; float:right; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#09f">查看我的足迹</a>
            </div>
            <div class="wofrgwcjb">
            	<ul>
                	<li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                    <li>
                    	<a href="#">
                        	<b>
                            	<img src="/static/Homes/img/gaoqingxianshiqi.jpg"/>
                            </b>
                            <h5>海尔润眼显示器</h5>
                            <span>3000元</span>
                        </a>
                        <a href="#" style=" width:184px; line-height:20px; font-size:12px; color:#666; display:block; text-align:center" class="qsbqmzb">帝云官方旗舰店</a>
                    </li>
                </ul>
            </div>
        <!--足迹结束-->    
        </div>
        <!--right结束-->
    </div>
    <!--详细列表结束-->
</div>
<!--个人中心结束-->
<!--页脚-->
<!--footer-->
<div class="footer">
	<div class="box" style=" width:1226px; margin:0 auto">
        <ul class="lian">
            <li>
                <p><img src="/static/Homes/img/fot.png">新手指南</p>
                <a href="#">账户注册</a>
                <a href="#">购物流程</a>
                <a href="#">网站地图</a>
            </li>
            <li>
                <p><img src="/static/Homes/img/fot1.png">支付方式</p>
                <a href="#">货到付款</a>
                <a href="#">在线支付</a>
                <a href="#">礼品卡及账户余额</a>
                <a href="#">其他支付方式</a>
            </li>
            <li>
                <p><img src="/static/Homes/img/fot2.png">配送说明</p>
                <a href="#">配送运费</a>
                <a href="#">配送时间</a>
            </li>
            <li>
                <p><img src="/static/Homes/img/fot3.png">售后服务</p>
                <a href="#">退换货政策</a>
                <a href="#">退换货办理流程</a>
                <a href="#">退换货网上办理</a>
                <a href="#">退款说明</a>
            </li>
            <li>
                <p><img src="/static/Homes/img/fot4.png">关于我们</p>
                <a href="#">公司简介</a>
                <a href="#">合作专区</a>
                <a href="#">联系我们</a>
                <a href="#">友情链接</a>
            </li>
            <li>
                <p><img src="/static/Homes/img/fot5.png">帮助中心</p>
                <a href="#">找回密码</a>
                <a href="#">邮件订阅</a>
                <a href="#">产品册订阅</a>
                <a href="#">隐私声明</a>
            </li>
        </ul>
        <ul class="adv">
        	<li><img src="/static/Homes/img/adv.png">正品保障</li>
            <li><img src="/static/Homes/img/adv1.png">免运费</li>
            <li><img src="/static/Homes/img/adv2.png">送货上门</li>
            <li style="border-right:none;"><img src="/static/Homes/img/adv3.png">实物拍摄</li>
        </ul>
        <p class="ad">地址：山东省济南市天桥区历山北路黄台电子商务产业园1020室 &nbsp;&nbsp;&nbsp;邮箱：xgm@8and9.com.cn &nbsp;&nbsp;&nbsp;邮编:210008 &nbsp;&nbsp;&nbsp;电话:025-83218155</p>
        <p class="ad">Copyright © 2010 - 2013, 版权所有 SHUIGUO.COM &nbsp;&nbsp;&nbsp;苏ICP备10088888号-1</p>
    </div>
</div>

</body>	
</html>    