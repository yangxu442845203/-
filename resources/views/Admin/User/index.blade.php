@extends("Admin.AdminPublic.adminpublic")
@section("admin")
<html>
 <head></head>
 <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>会员列表</span> 
   </div > 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <div id="did">
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 155px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 211px;">姓名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 198px;">邮箱</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 133px;">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 133px;">添加时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 133px;">修改时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">操作</th>
       </tr> 
      </thead> 

      <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($data as $row1)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row1->id}}</td> 
        <td class=" ">{{$row1->name}}</td> 
        <td class=" ">{{$row1->email}}</td> 
        <td class=" ">{{$row1->status}}</td> 
        <td class=" ">{{$row1->created_at}}</td> 
        <td class=" ">{{$row1->updated_at}}</td> 
        <td class=" ">
          <a href="/userinfo/{{$row1->id}}" class="btn btn-success">会员详情</a>
          <a href="/useraddress/{{$row1->id}}" class="btn btn-success">收货地址</a>
        	<form action="/adminuser/{{$row1->id}}" method="post">
        		{{csrf_field()}}
        		{{method_field("DELETE")}}
				<button class="btn btn-success" type="submit"><i class="icon-trash"></i></button>
        		<a class="btn btn-info" href="/adminuser/{{$row1->id}}/edit"><i class="icon-wrench"></i></a></td>
        	</form>
       </tr>
       @endforeach
      </tbody>
     </table>
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
      @foreach($pp as $row)
      <button class="btn btn-success" onclick="page({{$row}})">{{$row}}</button>
      @endforeach
     </div>
    </div> 
   </div> 
  </div>
 </body>
<script type="text/javascript">
function page(page){
  //alert(page);
  //Ajax请求
  $.get("/adminuser",{page:page},function(data){
    //alert(data);
    $("#did").html(data);
  });
}
</script>
</html>
@endsection
@section("title","后台会员列表")