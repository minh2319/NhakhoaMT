@extends('admin.layout.master')
@section('content')
@if (session('status'))
<SCRIPT type='text/javascript'> 
  setTimeout(function() { alert("{{session('status')}}"); }, 200);
</SCRIPT>
@endif
<!-- Nút button và From popup Thêm-->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalThem">
  Thêm Loại Dịch Vụ
</button>
<!-- Modal Them -->
<div class="modal fade" id="ModalThem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Loại Dịch Vụ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
      <form action={{url('admin/loaidichvu/them')}} method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="md-form mb-3">
            <b>Tên Loại Dịch Vụ</b>
            {{ csrf_field() }}
            <input type="text" name="ten" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <input type="submit" class="btn btn-primary" value="Thêm">
        </div> 
      </form>
    </div>
  </div>
</div>               
<!-- Kết thúc Nút button và From popup Thêm-->

<!-- Modal Sua -->
<div class="modal fade" id="ModalSua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa Loại Dịch Vụ          
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>     
      <div id="popupsua">  
        
      </div>
    </div>
  </div>
</div>               
<!--Tự động load SQL vào Table -->
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
       <th>Mã Dịch Vụ</th>
       <th>Tên Dịch Vụ</th>
       <th>Thao Tác</th>
     </tr>
   </thead>
   <tfoot>
    <tr>
     <th>Mã Dịch Vụ</th>
     <th>Tên Dịch Vụ</th>
     <th>Thao tác</th>
   </tr>
 </tfoot>
 <tbody>
  @foreach($loaidichvu as $row)
  <tr><td>{{$row['MaLoaiDichVu']}}</td>
    <td>{{$row['TenLoaiDichVu']}}</td>
    <td>
      <table>
        <tr><td>
         <button type="button" class="btn btn-danger" id="{{$row['MaLoaiDichVu']}}" onclick="ConfirmDelete(this.id)"  style="margin-top: -15px;" ><i class="fa fa-remove " style="font-size:20px"></i> </button>
       </td></tr><tr>
        <td>
          <button type="button" style="margin-top: -15px;margin-right: 15px;" id="{{$row['MaLoaiDichVu']}}" class="btn btn-primary" onclick="ajax_modal(this.id)">
           <i class="fa fa-edit " style="font-size:20px"></i>
         </button>
       </td></tr>
     </table>
   </td>
 </tr> 
 @endforeach
</tbody>
</table>
</div>
<script language="javascript">
  function ajax_xoa_ctpl(id)
  {
    window.location.replace('{{url('admin/loaidichvu/xoa')}}/'+id); 
  }
  function ConfirmDelete(id)
  {
    var x = confirm("Bạn muốn xóa Loại dịch vụ này khỏi danh sách?");
    if (x)
    { 
      ajax_xoa_ctpl(id);
      return true;
    }
    else
      return false;
  }   
  function ajax_modal(id)
  {
    $.get('{{url('admin/loaidichvu/ajaxmodal')}}/'+id,function(data){$("#popupsua").html(data);
  });
    $("#ModalSua").modal()
  }
</script>
<!--Kết thúc Tự động load SQL vào Table -->
@endsection