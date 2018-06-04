@extends('admin.layout.master')
@section('content')
<!--Tự động load SQL vào Table -->
@if (session('status'))
<SCRIPT type='text/javascript'> 
  setTimeout(function() { alert("{{session('status')}}"); }, 500);
</SCRIPT>
@endif
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
            {{ csrf_field() }}
            <b>Tên</b>
            <input type="text" name="ten" class="form-control">
             <b>Đường Dẫn</b>
            <input type="text" name="duongdan" class="form-control">
             <b>SDT</b>
            <input type="text" name="sdt" class="form-control">
             <b>Địa Chỉ</b>
            <input type="text" name="diachi" class="form-control">
             <b>Email</b>
            <input type="email" name="email" class="form-control">
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
        <h5 class="modal-title" id="exampleModalLabel">Sửa          
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
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
       <th>Mã Phòng Khám</th>
       <th>Đường dẫn</th>
       <th>Tên phòng khám</th>
       <th>SDT</th>
       <th>DiaChi</th>
       <th>Email</th>
       <th>Thao tác</th>
     </tr>
   </thead>
   <tfoot>
    <tr>
     <th>Mã Phòng Khám</th>
     <th>Đường dẫn</th>
     <th>Tên phòng khám</th>
     <th>SDT</th>
     <th>DiaChi</th>
     <th>Email</th>
     <th>Thao tác</th>

   </tr>
 </tfoot>
 <tbody>
  @foreach($phongkham as $row)
  <tr><td>{{$row['MaPhongKham']}}</td>
    <td>{!!$row['DuongDan']!!}</td>
    <td>{{$row['TenPhongKham']}}</td>
    <td>{{$row['SDT']}}</td>
    <td>{{$row['DiaChi']}}</td>
    <td>{{$row['Email']}}</td>
    <td>
  <table>
    <tr><td>
     <button type="button" class="btn btn-danger" id="{{$row['MaPhongKham']}}" onclick="ConfirmDelete(this.id)"  style="margin-top: -15px;" ><i class="fa fa-remove " style="font-size:20px"></i> </button>
   </td></tr><tr>
    <td>
      <button type="button" style="margin-top: -15px;margin-right: 15px;" id="{{$row['MaPhongKham']}}" class="btn btn-primary" onclick="ajax_modal(this.id)">
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
  function ajax_xoa_ctpl(mactpl)
  {
    window.location.replace('xoa/'+mactpl); 
  }
  function ConfirmDelete(mactpl)
  {
    var x = confirm("Bạn muốn xóa Bài hát này khỏi danh sách?");
    if (x)
    {
      ajax_xoa_ctpl(mactpl);
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