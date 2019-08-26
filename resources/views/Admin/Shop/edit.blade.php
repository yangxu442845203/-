@extends("Admin.AdminPublic.adminpublic")
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>商品修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/adminshop/{{$shop->id}}" method="post"> 
     <div class="mws-form-inline">       
      
      <div class="mws-form-row"> 
       <label class="mws-form-label">商品名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" value="{{$shop->name}}"/> 
       </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">商品类别</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="cate_id" value="{{$shop->cate_id}}"/> 
       </div> 
      </div>

     <!--  <div class="mws-form-row"> 
       <label class="mws-form-label">商品图片</label> 
       <div class="mws-form-item"> 
        <img src="{{$shop->pic}}" width="100px" height="100px">
        <input type="text" class="large" name="pic" value=""/> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label">商品描述</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="descr" value="{{$shop->descr}}"/> 
       </div> 
      </div> -->

      <div class="mws-form-row"> 
       <label class="mws-form-label">商品数量</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="num" value="{{$shop->num}}"/> 
       </div> 
      </div>
      
      <div class="mws-form-row"> 
       <label class="mws-form-label">商品价格</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="price" value="{{$shop->price}}"/> 
       </div> 
      </div>

     </div>
     {{csrf_field()}}
     {{method_field("put")}}
     <div class="mws-button-row"> 
      <input type="submit" value="Submit" class="btn btn-danger" /> 
      <input type="reset" value="Reset" class="btn " /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","后台商品修改")