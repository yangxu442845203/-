<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <title>黑色书城</title> 
  <link rel="stylesheet" type="text/css" href="/static/Homes/css/index.css" /> 
  <link rel="stylesheet" type="text/css" href="/static/Homes/css/lunbo.css" /> 
  <script src="/static/Homes/js/jquery-1.8.3.min.js"></script> 
  <script src="/static/Homes/js/public.js"></script> 
 </head> 
 <body> 
  <!--顶部菜单--> 
  <div class="dy1"> 
   <div class="dy2"> 
    <ul class="dy3"> 
     <li><a href="#">乐乐官网<br />乐乐官网</a></li> 
     <li><a href="#" id="diyunapp">商城APP<br />商城APP</a></li> 
    </ul> 
    <a href="http://www.php217.com/homecart" class="dy5">购物车</a> 
    <ul class="dy4">
    @if(session("email"))
    	<li><a href="/homeperson" target="_top" class="h">hello,{{session('email')}}</a></li> 
    	<li><a href="http://www.php217.com/homelogout">退出</a></li>
    @else
     <li><a href="http://www.php217.com/homelogin/create" target="_top" class="h">登录<br />登录</a></li> 
     <li><a href="http://www.php217.com/homeregister/create">注册<br />注册</a></li> 
     @endif
    </ul>  
    <div class="dy9"> 
     <img src="/static/Homes/img/phone.png" /> 
    </div> 
   </div> 
  </div> 
  <!--logo加时间加搜索框--> 
  <div class="dy10"> 
   <div class="dy11"> 
    <img src="/static/Homes/img/logos.png" /> 
   </div> 
   <div class="dy13"> 
    <embed src="/static/Homes/img/honehone_clock_wh.swf" style=" height:45px; width:120px" /> 
   </div> 
   <div class="dy12"> 
    <input type="text" value="搜索商品/店铺" onfocus="if(value=='搜索商品/店铺') {value=''}" onblur="if (value=='') {value='搜索商品/店铺'}" style="width:500px; height:36px; text-indent:12px; font-size:12px; color:#666; float:left" /> 
    <input type="search" value="搜索" style=" cursor:pointer; width:70px; height:36px; float:right; text-align:center; background:#333;" class="shousuo" /> 
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

  <!--banner轮播引入lunbo.css和daohang.js--> 
  <div id="big_banner_wrap" style="display:block"> 
     <!-- 侧边栏开始 -->
  <ul id="banner_menu_wrap"> 
  @foreach($cates as $row)
    <li class="active" img=""> <a>{{$row->name}}</a> <a class="banner_menu_i">&gt;</a> 
     @if(count($row->suv))
     <div class="banner_menu_content" style="width: 300px; top: -20px;">       
      @foreach($row->suv as $rows)
      <ul class="banner_menu_content_ul">     
       <li> 
        <a><img src="/static/Homes/img/headphone.jpg" /></a><a>{{$rows->name}}</a><span>选购</span>
       </li>
      @foreach($rows->suv as $rr)
       <li> 
        <a><span>{{$rr->name}}</span></a>
       </li>
      @endforeach     
      </ul>
      @endforeach          
     </div>
     @endif 
    </li>     
  @endforeach
   </ul>
   <!-- 侧边栏结束 --> 

   <div id="big_banner_pic_wrap"> 
    <ul id="big_banner_pic"> 
     @foreach($lunbotu as $row)
     <li><img src="{{$row->pic}}" width="100%" height="460px" /></li> 
     @endforeach
    </ul> 
   </div>  
   
   <div id="big_ba0nner_change_wrap"> 
    <div id="big_banner_change_prev">
      &lt;
    </div> 
    <div id="big_banner_change_next">
     &gt;
    </div> 
   </div> 
  </div> 
  <script src="/static/Homes/js/daohang.js"></script> 
  
  <!--乐乐周边啊--> 
  <div class="dy14"> 
   <div class="dy15"> 
    <ul> 
     <li><a href="#">乐乐OA<br />乐乐OA</a></li> 
     <li><a href="#">乐乐APP<br />乐乐APP</a></li> 
     <li><a href="#">乐乐网贷<br />乐乐网贷</a></li> 
     <li><a href="#">话费充值<br />话费充值</a></li> 
     <li><a href="#">乐乐订餐<br />乐乐订餐</a></li> 
     <li><a href="#">乐乐外包<br />乐乐外包</a></li> 
    </ul> 
   </div> 
   <div class="dy16"> 
    <ul> 
     <li><a href="#"><img src="/static/Homes/img/jinghuaqi.jpg" /></a></li> 
     <li><a href="#"><img src="/static/Homes/img/jinghuaqi1.jpg" /></a></li> 
     <li><a href="#"><img src="/static/Homes/img/jinghuaqi2.jpg" /></a></li> 
    </ul> 
   </div> 
  </div> 

  <!--一个推荐商品的轮播--> 
  <div class="kongzhianniu"> 
   <div class="lunbobanner"> 
    <ul class="lunboimg"> 
     <li> <a href="#"> <b><img src="/static/Homes/img/diannaozhuji.png" /></b> <h5>磐石DIY游戏主机</h5> <p>坚如磐石，带给你极致游戏体验</p> <span>5000元5</span> </a> <a href="#"> <b><img src="/static/Homes/img/diannaozhuji.png" /></b> <h5>磐石DIY游戏主机</h5> <p>坚如磐石，带给你极致游戏体验</p> <span>5000元5</span> </a> <a href="#"> <b><img src="/static/Homes/img/diannaozhuji.png" /></b> <h5>磐石DIY游戏主机</h5> <p>坚如磐石，带给你极致游戏体验</p> <span>5000元5</span> </a> <a href="#"> <b><img src="/static/Homes/img/diannaozhuji.png" /></b> <h5>磐石DIY游戏主机</h5> <p>坚如磐石，带给你极致游戏体验</p> <span>5000元5</span> </a> <a href="#"> <b><img src="/static/Homes/img/diannaozhuji.png" /></b> <h5>磐石DIY游戏主机</h5> <p>坚如磐石，带给你极致游戏体验</p> <span>5000元5</span> </a> </li> 
     <li> <a href="#"> <b><img src="/static/Homes/img/diannaozhuji.png" /></b> <h5>磐石DIY游戏主机</h5> <p>坚如磐石，带给你极致游戏体验</p> <span>5000元5</span> </a> <a href="#"> <b><img src="/static/Homes/img/diannaozhuji.png" /></b> <h5>磐石DIY游戏主机</h5> <p>坚如磐石，带给你极致游戏体验</p> <span>5000元5</span> </a> <a href="#"> <b><img src="/static/Homes/img/diannaozhuji.png" /></b> <h5>磐石DIY游戏主机</h5> <p>坚如磐石，带给你极致游戏体验</p> <span>5000元5</span> </a> <a href="#"> <b><img src="/static/Homes/img/diannaozhuji.png" /></b> <h5>磐石DIY游戏主机</h5> <p>坚如磐石，带给你极致游戏体验</p> <span>5000元5</span> </a> <a href="#"> <b><img src="/static/Homes/img/diannaozhuji.png" /></b> <h5>磐石DIY游戏主机</h5> <p>坚如磐石，带给你极致游戏体验</p> <span>5000元5</span> </a> </li> 
    </ul> 
   </div> 
   <div class="btnl">
    &lt;
   </div> 
   <div class="btnr">
    &gt;
   </div> 
   <h4 class="guanfangremai">官方热卖</h4> 
  </div> 

  <!--其它商品1-->  
  <div class="dy17"> 
   <!--服装鞋包--> 
    @foreach($cates as $row)
   <div class="dy18" id="fzxba"> 
    <div class="dy20"> 
     <h3>{{$row->name}}</h3> 
     <div class="xxddh"> 
     @foreach($row->suv as $rr)
      <a href="#" class="cate a-1-dy23" mt-floor="1" mt-ct="dy23">{{$rr->name}}</a> 
     @endforeach
     </div> 
    </div> 
    <div class="dy21"> 
     <div class="dy22"> 
      <div class="dy24">
       <a href="#"><img src="/static/Homes/img/576c00e9N4c11aa86.jpg" /></a>
      </div> 
      <div class="dy25"> 
       <ul> 
        <li><a href="#">空调</a></li> 
        <li><a href="#">冰箱</a></li> 
        <li><a href="#">洗衣机</a></li> 
        <li><a href="#">家庭影院</a></li> 
        <li><a href="#">DVD播放机</a></li> 
        <li><a href="#">迷你音响</a></li> 
        <li><a href="#">烟机/灶具</a></li> 
        <li><a href="#">热水器/消毒柜</a></li> 
        <li><a href="#">洗碗机</a></li> 
        <li><a href="#">酒柜/冰吧/冷柜</a></li> 
       </ul> 
      </div> 
     </div> 
     <div class="bigrongqi">

      <div class="pinpai b-1-dy23"> 
     @foreach($shop as $s) 
     @foreach($s as $ss)
     @if($ss->cid == $row->id)
       <ul> 
        <li> 
        	<a href="/homeindex/{{$ss->sid}}"> 
        		<b> <img src="{{$ss->pic}}"  width="245px" height="302px"/> </b> 
        		<h2>{{$ss->sname}}</h2> 
        		<span>￥{{$ss->price}}</span> 
        	</a> 
        	<a href="#" style=" width:100%; height:20px; line-height:20px; font-size:12px; color:#666; text-align:left; text-indent:10px" class="dianpud">乐乐旗舰店</a> 
        </li> 
      @endif
      @endforeach  
      @endforeach    
      </div>
                    
     </div> 
    </div> 
   </div> 
   @endforeach
    
   <!--友情链接-->
   <div class="dy17"> 
   <!--服装鞋包--> 
   <div class="dy18" id="fzxba"> 
    <div class="dy20"> 
     <h3>友情链接</h3> 
     <div class="xxddh"> 
      <a href="#" class="cate a-1-dy23" mt-floor="1" mt-ct="dy23"></a> 
     </div> 
    </div> 
    <div class="dy21"> 
     <div class="dy22"> 
      <div class="dy24">
       <a href="#"><img src="/static/Homes/img/576c00e9N4c11aa86.jpg" /></a>
      </div> 
      <div class="dy25"> 
       <ul> 
        <li><a href="#">空调</a></li> 
        <li><a href="#">冰箱</a></li> 
        <li><a href="#">洗衣机</a></li> 
        <li><a href="#">家庭影院</a></li> 
        <li><a href="#">DVD播放机</a></li> 
        <li><a href="#">迷你音响</a></li> 
        <li><a href="#">烟机/灶具</a></li> 
        <li><a href="#">热水器/消毒柜</a></li> 
        <li><a href="#">洗碗机</a></li> 
        <li><a href="#">酒柜/冰吧</a></li> 
       </ul> 
      </div> 
     </div> 
     <div class="bigrongqi">

      <div class="pinpai b-1-dy23"> 
     @foreach($youqing as $y)
       <ul> 
        <li> 
        	<a href="{{$y->wangzhi}}"> 
        		<img src="{{$y->pic}}"  width="196px" height="202px"/>          
        		<h2>{{$y->name}}</h2>
            <h2>{{$y->wangzhi}}</h2> 
        	 </a>
        </li>
      </ul>
        @endforeach   
      </div>                    
     </div> 
    </div>
   <!--友情链接结束-->

   <!--快速导航菜单--> 
   <div class="dy19" style="width:110px"> 
    <a href="#fzxba">服装鞋包</a>
        <a href="#ghmza">个护美妆</a>
        <a href="#sjtxa">手机通讯</a>
        <a href="#jydqa">家用电器</a>
        <a href="#dnsma">电脑数码</a>
        <a href="#ydjsa">运动健身</a>
        <a href="#jjsha">居家生活</a>
        <a href="#mywja">母婴玩具</a>
        <a href="#spbja">食品保健</a>
        <a href="#tsyxa">图书音像</a>
        <a href="#zcypa">整车用品</a>
   </div> 
  </div> 
  <script type="text/javascript"> 
$(function() { 
$(window).scroll(function() { 
var top = $(window).scrollTop()-$(this).scrollTop()+200
 
$(".dy19").css({top: top }); 
}); 
}); 
</script> 
  <!--页脚--> 
  <!--footer--> 
  <div class="footer"> 
   <div class="box" style=" width:1226px; margin:0 auto"> 
    <ul class="lian"> 
     <li> <p><img src="/static/Homes/img/fot.png" />新手指南</p> <a href="#">账户注册</a> <a href="#">购物流程</a> <a href="#">网站地图</a> </li> 
     <li> <p><img src="/static/Homes/img/fot1.png" />支付方式</p> <a href="#">货到付款</a> <a href="#">在线支付</a> <a href="#">礼品卡及账户余额</a> <a href="#">其他支付方式</a> </li> 
     <li> <p><img src="/static/Homes/img/fot2.png" />配送说明</p> <a href="#">配送运费</a> <a href="#">配送时间</a> </li> 
     <li> <p><img src="/static/Homes/img/fot3.png" />售后服务</p> <a href="#">退换货政策</a> <a href="#">退换货办理流程</a> <a href="#">退换货网上办理</a> <a href="#">退款说明</a> </li> 
     <li> <p><img src="/static/Homes/img/fot4.png" />关于我们</p> <a href="#">公司简介</a> <a href="#">合作专区</a> <a href="#">联系我们</a> <a href="#">友情链接</a> </li> 
     <li> <p><img src="/static/Homes/img/fot5.png" />帮助中心</p> <a href="#">找回密码</a> <a href="#">邮件订阅</a> <a href="#">产品册订阅</a> <a href="#">隐私声明</a> </li> 
    </ul> 
    <ul class="adv"> 
     <li><img src="/static/Homes/img/adv.png" />正品保障</li> 
     <li><img src="/static/Homes/img/adv1.png" />免运费</li> 
     <li><img src="/static/Homes/img/adv2.png" />送货上门</li> 
     <li style="border-right:none;"><img src="/static/Homes/img/adv3.png" />实物拍摄</li> 
    </ul> 
    <p class="ad">地址山东省济南市历下区历山北路 &nbsp;&nbsp;&nbsp;邮箱：xgm@8and9.com.cn &nbsp;&nbsp;&nbsp;邮编:210008 &nbsp;&nbsp;&nbsp;电话:025-83218155</p> 
    <p class="ad">Copyright &copy; 2010 - 2013, 版权所有 SHUIGUO.COM &nbsp;&nbsp;&nbsp;苏ICP备10088888号-1</p> 
   </div> 
  </div>   
 </body>
</html>