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
  Thêm Dịch Vụ
</button>
<!-- Modal Them -->
<div class="modal fade" id="ModalThem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Dịch Vụ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
      <form action='them' method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="md-form mb-3">
            {{ csrf_field() }}
            <b>Tên Dịch Vụ</b>
            <input type="text" name="ten" class="form-control">
            <b>Giá</b>
            <input type="text" name="gia" class="form-control">
             <b>Loại Dịch Vụ</b>
            <select name="maloaidichvu" class="custom-select" >
              @foreach($loaidichvu as $row)
              <option value={{$row["MaLoaiDichVu"]}}> {{$row["TenLoaiDichVu"]}}
              </option>
              @endforeach  
            </select>
            <b>Giới thiệu</b>
            <textarea name="gioithieu" class="form-control" id="editor1"></textarea>
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
  <div class="modal-dialog  modal-lg" role="document">
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
        <th>Giá </th>
        <th>Giới Thiệu</th>
        <th>Tên Loại Dịch Vụ</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>MaDichVu</th>
        <th>TenDichVu</th>
        <th>Gia</th>
        <th>GioiThieu</th>
        <th>Tên Loại Dịch Vụ</th>
        <th>Thao tác</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($dichvu as $row)
{{--   <tr><td>{{$row['MaBacSi']}}</td>
 --}}    <td>{{$row['MaDichVu']}}</td>
 <td>{{$row['TenDichVu']}}</td>
 <td>{{$row['Gia']}}</td>
 <td>
   <textarea  rows="5" cols="40" readonly="readonly" >{{$row['GioiThieu']}}</textarea>
 </td>
 <td>

  @foreach($loaidichvu as $ldv)
  @if($ldv["MaLoaiDichVu"]==$row['MaLoaiDichVu'])
  {{$ldv["TenLoaiDichVu"]}}
  @endif
  @endforeach 
</td>
<td>
  <table>
    <tr><td>
      <button type="button" class="btn btn-danger"id="{{$row['MaDichVu']}}" onclick="ConfirmDelete(this.id)" role="button" style="margin-top: -15px;" ><i class="fa fa-remove " style="font-size:20px"></i> </button>
    </td></tr><tr>
      <td>
        <button type="button" style="margin-top: -15px;" id="{{$row['MaDichVu']}}" class="btn btn-primary" onclick="ajax_modal(this.id)">
          <i class="fa fa-edit " style="font-size:20px"></i></button>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('editor1'); </script>

<!--Kết thúc Tự động load SQL vào Table -->
@endsection