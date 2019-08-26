@extends("Admin.AdminPublic.adminpublic")
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>角色修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/auth/{{$node->id}}" method="post"> 
     <div class="mws-form-inline">       
      
      <div class="mws-form-row"> 
       <label class="mws-form-label">权限名称</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name" value="{{$node->name}}"/> 
       </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">控制器</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="mname" value="{{$node->mname}}"/> 
       </div> 
      </div>

      <div class="mws-form-row"> 
       <label class="mws-form-label">方法</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="aname" value="{{$node->aname}}"/> 
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
@section("title","后台管理员修改")