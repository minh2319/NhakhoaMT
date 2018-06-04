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
 <b class="fa fa-plus " style="font-size:18px"> </b> Thêm 
</button>
<!-- Modal Them -->
<div class="modal fade" id="ModalThem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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
            <b>Tên tin tức</b>
            <input type="text" name="ten" class="form-control">
            <b>Tiêu đề không dấu</b>
            <input type="text" name="tieude" class="form-control">
            <b>Hình ảnh</b>
            <div class="custom-file" style="margin-bottom: 13px;">
              <input type="file" class="custom-file-input" name ="file" id="customFile" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>  
            <b>Nội Dung</b>
            <textarea name="noidung" class="form-control" id="editor1"></textarea>
              <b>Tóm Tắt</b>
            <textarea name="tomtat" class="form-control" ></textarea>
            <b>Loại Tin</b>
            <select name="loaitin" class="form-control" >
              @foreach($loaitin as $row)
              <option value={{$row["MaLoaiTin"]}}> {{$row["TenLoaiTin"]}}
              </option>
              @endforeach  
            </select>
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
        <th>Tên</th>
        <th>Tiêu đề không dấu</th>
        <th>Hình</th>
        <th>Ngày Đăng</th>
        <th>Nội Dung</th>
        <th>Tóm Tắt</th>
        <th>Trạng Thái</th>
        <th>Loại Tin</th>
        <th>Thao Tác</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
       <th>Tên</th>
       <th>Tiêu đề không dấu</th>
       <th>Hình</th>
       <th>Ngày Đăng</th>
       <th>Nội Dung</th>
       <th>Tóm Tắt</th>
       <th>Trạng Thái</th>
       <th>Loại Tin</th>
       <th>Thao Tác</th>
     </tr>
   </tfoot>
   <tbody>
    @foreach($tintuc as $row)
   <td>{{$row['TenTinTuc']}}</td>
 <td>{{$row['TieuDeKhongDau']}}</td>
 <td>
   <img style="width: 210px;height: 150px;" src=  {{asset('upload/'.$row['HinhAnh'])}}>
 </td>
  <td>{{$row['NgayDang']}}</td>
 <td>
   <textarea  rows="5" cols="40" readonly="readonly" >{{$row['NoiDung']}}</textarea>
 </td><td>
<textarea  rows="5" cols="40" readonly="readonly" >{{$row['TomTat']}}</textarea> </td>
<td>
  @if($row["TrangThai"]==0)
  <b style="color: red">Ẩn</b>
  @else
  <b style="color: green">Hiện</b>
  @endif
</td><td>
  @foreach($loaitin as $tk)
  @if($tk["MaLoaiTin"]==$row['MaLoaiTin'])
  {{$tk["TenLoaiTin"]}}
  @endif
  @endforeach 
</td>

<td>
  <table>
    <tr><td>
     <button type="button" class="btn btn-danger" id="{{$row['MaTinTuc']}}" onclick="ConfirmDelete(this.id)"  style="margin-top: -15px;" ><i class="fa fa-remove " style="font-size:20px"></i> </button>
   </td></tr><tr>
    <td>
      <button type="button" style="margin-top: -15px;margin-right: 15px;" id="{{$row['MaTinTuc']}}" class="btn btn-primary" onclick="ajax_modal(this.id)">
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('editor1'); </script>

<!--Kết thúc Tự động load SQL vào Table -->
@endsection