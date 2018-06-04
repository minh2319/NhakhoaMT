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
  Thêm 
</button>
<!-- Modal Them -->
<div class="modal fade" id="ModalThem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
      <form action='them' method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="md-form mb-3">
            <b>Tên Loại Tin</b>
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
       <th>Mã Loại Tin</th>
       <th>Tên  Loại Tin</th>
       <th>Thao Tác</th>
     </tr>
   </thead>
   <tfoot>
    <tr>
     <th>Mã Loại Tin</th>
       <th>Tên  Loại Tin</th>
       <th>Thao Tác</th>
   </tr>
 </tfoot>
 <tbody>
  @foreach($loaitin as $row)
  <tr><td>{{$row['MaLoaiTin']}}</td>
    <td>{{$row['TenLoaiTin']}}</td>
    <td>
      <table>
        <tr><td>
          <a class="btn btn-danger" id="{{$row['MaLoaiTin']}}" onclick="ConfirmDelete(this.id)" role="button" style="margin-top: -15px;" >Xóa</a>
        </td>
        <td>
          <button type="button" style="margin-top: -15px;" id="{{$row['MaLoaiTin']}}" class="btn btn-primary" onclick="ajax_modal(this.id)">
            Sửa
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
    window.location.replace('xoa/'+id); 
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
    $.get('ajaxmodal/'+id,function(data){$("#popupsua").html(data);
  });
    $("#ModalSua").modal()
  }
</script>
<!--Kết thúc Tự động load SQL vào Table -->
@endsection