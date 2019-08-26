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
            <!--订单状态-->
            <div class="dfdaspjtk">
                <span style=" display:block; float:left; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666">订单状态:<s style="color:#09f">订单已经提交，等待买家付款</s>如果您未对该笔订单进行支付操作，<s style="color:#09f">系统将于 2016-07-04 08:33:23</s> 自动关闭该订单</span>
            </div>
            <!--订单信息-->
            <div class="dfdaspjtk">
                <span style=" display:block; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666; border-bottom:1px dashed #cacace">订单信息</span>   
                <!--一条开始-->
                <div class="qieken">
                	<em>收货人:</em>                  
                    <span>{{session('email')}}</span>
                    <em>电话</em>
                    <span>xxxxxxxxxxx</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->        
                <div class="qieken">
                    <em>收货地址:</em>
                    <span>{{$orders->xhuo}}</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>买家留言:</em>
                    <span>嘻嘻嘻嘻嘻嘻嘻嘻</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>订单编号:</em>
                    <span>8000000000009301</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>商铺:</em>
                    <span>帝云自营店</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>下单时间:</em>
                    <span>2016-6-6&nbsp;14:02</span>
                </div>
                <!--一条结束-->
                 <!--一条开始-->
                <div class="qieken">
                    <em>支付方式:</em>
                    <span>在线支付</span>
                </div>
                <!--一条结束-->
            </div>
            <!--发货信息-->
            
            <div class="dfdaspjtk">
                <span style=" display:block; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666; border-bottom:1px dashed #cacace">发货信息</span>   
                <!--一条开始-->
                <div class="qieken">
                    <em>物流公司:</em>
                    <span>申通快递</span>
                    
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>物流单号:</em>
                    <span>8000000000001301</span>
                    
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>发货人:</em>
                    <span>小明</span>
                    <span>1555443553</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>发货地址:</em>
                    <span>山东省   济南市 历城区&nbsp;山东省 济南市 历城区 石家庄市桥西区金正帝景城</span>
                </div>
                <!--一条结束-->
                
            </div>
            <!--订单状态-->
            <div class="dfdaspjtk">
                <span style=" display:block; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666; border-bottom:1px dashed #cacace">订单状态</span>   
                
                <b style=" display:block; width:960px; height:56px; position:relative; margin:0 auto; padding-bottom:10px"><img src="/static/Homes/img/jindutiao0.png"/>
                <!--第一段时间-->
                    <i style="position:absolute; top:46px; left:0; font-size:12px; color:#999; font-weight:100">2016-07-01 08:33:23 </i>
                <!--第二段时间-->
                    <i style="position:absolute; top:46px; left:215px; font-size:12px; color:#999; font-weight:100">2016-07-01 08:33:23 </i>
                <!--第三段时间-->
                    <i style="position:absolute; top:46px; left:430px; font-size:12px; color:#999; font-weight:100">2016-07-01 08:33:23 </i>
                <!--第四段时间-->
                <i style="position:absolute; top:46px; left:646px; font-size:12px; color:#999; font-weight:100">2016-07-01 08:33:23 </i>
                <!--第五段时间-->
                <i style="position:absolute; top:46px; left:830px; font-size:12px; color:#999; font-weight:100">2016-07-01 08:33:23 </i>
                </b>
            </div>
        <!--所有列表-->
            <div class="sydlbdzz">
                <!--一个列表开始-->
                <div class="gzdlbdzzl">
                    <!--左-->
                    <div class="spzhaopin">
                        <a href="#"><img src="/static/Homes/img/img02.jpg"/></a>
                    </div>
                    <!--中-->
                    <div class="youstdongi">
                        <a href="#"><h5 style=" float:left">中华老字号乌鸡白凤丸300粒</h5></a>
                        <span>下单时间：2016-6-6&nbsp;14:08</span>
                        <span style=" color:#f00">订单状态：待付款</span>
                        <span>订单金额：<s style="color:#f00; font-weight:bold; font-size:14px">￥600</s>
                        <s style="color:#666; margin-left:10px">(1)件</s>
                        <s style="color:#666; margin-left:10px">免运费</s>
                        <s style="color:#666; margin-left:10px">支付宝</s>
                        <a href="#" style="margin-left:10px">小明的店铺</a>
                        <a href="#" style=" margin-left:10px">交易投诉</a>
                        
                        <a href="#" style="color:#F00; cursor:pointer; float:right">删除</a></span>
                    </div>
                    <!--右-->
                    <div class="quzhifubasb">
                        <a href="#">取消订单</a>
                    </div>
                    <!--右下-->
                    <div class="chakanxiangqingfg">
                        <a href="#">支付订单</a>
                    </div>
                </div>
                <!--一个列表结束-->
                <!--一个列表开始-->
                <div class="gzdlbdzzl">
                    <!--左-->
                    <div class="spzhaopin">
                        <a href="#"><img src="/static/Homes/img/img02.jpg"/></a>
                    </div>
                    <!--中-->
                    <div class="youstdongi">
                        <a href="#"><h5 style=" float:left">中华老字号乌鸡白凤丸300粒</h5></a>
                        <span>下单时间：2016-6-6&nbsp;14:08</span>
                        <span style=" color:#f00">订单状态：待发货</span>
                        <span>订单金额：<s style="color:#f00; font-weight:bold; font-size:14px">￥600</s>
                        <s style="color:#666; margin-left:10px">(1)件</s>
                        <s style="color:#666; margin-left:10px">免运费</s>
                        <s style="color:#666; margin-left:10px">支付宝</s>
                        <a href="#" style="margin-left:10px">小明的店铺</a>
                        <a href="#" style=" margin-left:10px">交易投诉</a>
                        
                        <a href="#" style="color:#F00; cursor:pointer; float:right">删除</a></span>
                    </div>
                    <!--右-->
                    <div class="quzhifubasb">
                        <a href="#">订单退款</a>
                    </div>
                    <!--右下-->
                    
                </div>
                <!--一个列表结束-->
                <!--一个列表开始-->
                <div class="gzdlbdzzl">
                    <!--左-->
                    <div class="spzhaopin">
                        <a href="#"><img src="/static/Homes/img/img02.jpg"/></a>
                    </div>
                    <!--中-->
                    <div class="youstdongi">
                        <a href="#"><h5 style=" float:left">中华老字号乌鸡白凤丸300粒</h5></a>
                        <span>下单时间：2016-6-6&nbsp;14:08</span>
                        <span style=" color:#09f">订单状态：已发货</span>
                        <span>订单金额：<s style="color:#f00; font-weight:bold; font-size:14px">￥600</s>
                        <s style="color:#666; margin-left:10px">(1)件</s>
                        <s style="color:#666; margin-left:10px">免运费</s>
                        <s style="color:#666; margin-left:10px">支付宝</s>
                        <a href="#" style="margin-left:10px">小明的店铺</a>
                        <a href="#" style=" margin-left:10px">交易投诉</a>
                        
                        <a href="#" style="color:#F00; cursor:pointer; float:right">删除</a></span>
                    </div>
                    <!--右-->
                    <div class="quzhifubasb">
                        <a href="#">确认收货</a>
                    </div>
                    <!--右下-->
                    <div class="chakanxiangqingfg">
                        <a href="#">查看物流</a>
                    </div>
                </div>
                <!--一个列表结束-->
                <div style="width:980px; background:rgba(0,66,255,0.1); height:auto; overflow:hidden">
                    <em style=" display:block; padding-left:20px; font-size:14px; line-height:30px; color:#666; float:left">应付金额：<s style=" color:#f00; font-weight:bold">600</s>元</em> <span style=" display:block; padding-left:20px; font-size:14px; line-height:30px; color:#666; float:left">免运费</span>
                </div>
            </div> 
        <!--所有列表结束-->    
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