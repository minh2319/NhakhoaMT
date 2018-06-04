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
            <b>Hình ảnh</b>
            <div class="custom-file" style="margin-bottom: 13px;">
              <input type="file" class="custom-file-input" name ="file" id="customFile" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>          
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
        <th>Mã Logo</th>
        <th>Hình Ảnh</th>
        <th>Tình Trạng</th>
        <th>Thao Tác</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Mã Logo</th>
        <th>Hình Ảnh</th>
        <th>Tình Trạng</th>
        <th>Thao Tác</th>
     </tr>
   </tfoot>
   <tbody>
    @foreach($logo as $row)
    <tr><td>{{$row['MaLogo']}}</td>
     <td>
   <img style="width: 250px;height: 190px;" src=  {{asset('upload/'.$row['HinhAnh'])}}>
 </td>
  <td>
  @if($row["TinhTrang"]==0)
  <b style="color: red">Ẩn</b>
  @else
  <b style="color: green;font-size: 20px;">Hiện</b>
  @endif
</td>
      <td>
        <table>
          <tr><td>
            <a class="btn btn-danger" id="{{$row['MaLogo']}}" onclick="ConfirmDelete(this.id)" role="button" style="margin-top: -15px;" >Xóa</a>
          </td>
          <td>
        <button type="button" style="margin-top: -15px;" id="{{$row['MaLogo']}}" class="btn btn-primary" onclick="ajax_an_ctpl(this.id)">
         @if($row["TinhTrang"]==1)
         Ẩn
         @else
         Hiện
         @endif
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
   function ajax_an_ctpl(id)
  {
    window.location.replace('suatinhtrang/'+id); 
  }
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