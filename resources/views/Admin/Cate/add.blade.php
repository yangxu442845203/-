@extends("Admin.AdminPublic.adminpublic")
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>分类添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/admincates" method="post"> 
     <div class="mws-form-inline">       
      <div class="mws-form-row"> 
       <label class="mws-form-label">分类姓名</label> 
       <div class="mws-form-item"> 
        <input type="text" class="large" name="name">
       </div> 
      </div>      
      <div class="mws-form-row"> 
       <label class="mws-form-label">父类</label> 
       <div class="mws-form-item"> 
        <select class="large" name="pid">
            <option value="0">--请选择--</option>
            @foreach($cates as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
        </select> 
       </div> 
      </div> 
     </div>
     {{csrf_field()}}
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
@section("title","后台分类添加")