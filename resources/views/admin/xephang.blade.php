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
            {{ csrf_field() }}
            <b>Tên Xếp Hạng</b>
            <input type="text" name="ten" class="form-control">
            <b>Phần Trăm Giảm Giá</b>
            <input type="text" name="ptgg" class="form-control">
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
<!--Tự động load SQL vào Table -->
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
       <th>Mã xếp hạng</th>
       <th>Tên xếp hạng</th>
       <th>Phần trăm giảm giá</th>
       <th>Thao Tác</th>
     </tr>
   </thead>
   <tfoot>
    <tr>
         <th>Mã xếp hạng</th>
       <th>Tên xếp hạng</th>
       <th>Phần trăm giảm giá</th>
       <th>Thao Tác</th>
    </tr>
  </tfoot>
  <tbody>
    @foreach($xephang as $row)
    <tr><td>{{$row['MaXepHang']}}</td>
      <td>{{$row['TenXepHang']}}</td>
      <td>{{$row['PhanTramGiamGia']}}</td>
      <td>
        <table>
        <tr><td>
         <button type="button" class="btn btn-danger" id="{{$row['MaXepHang']}}" onclick="ConfirmDelete(this.id)"  style="margin-top: -15px;" ><i class="fa fa-remove " style="font-size:20px"></i> </button>
       </td></tr><tr>
        <td>
          <button type="button" style="margin-top: -15px;margin-right: 15px;" id="{{$row['MaXepHang']}}" class="btn btn-primary" onclick="ajax_modal(this.id)">
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
    window.location.replace('xoa/'+id); 
  }
  function ConfirmDelete(id)
  {
    var x = confirm("Bạn muốn xóa khỏi danh sách?");
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