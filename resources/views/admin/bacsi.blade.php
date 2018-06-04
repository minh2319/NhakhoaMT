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
 <b class="fa fa-plus " style="font-size:18px"> </b> Thêm Bác Sĩ
</button>
<!-- Modal Them -->
<div class="modal fade" id="ModalThem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Bác Sĩ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
      <form action='them' method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="md-form mb-3">
            {{ csrf_field() }}
            <b>Tên Bác sĩ</b>
            <input type="text" name="ten" class="form-control">
            <b>SDT</b>
            <input type="text" name="sdt" class="form-control">
            <b>Năm sinh</b>
            <input type="date" name="namsinh" class="form-control">
            <b>Hình ảnh</b>
            <div class="custom-file" style="margin-bottom: 13px;">
              <input type="file" class="custom-file-input" name ="file" id="customFile" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>  
            <b>Giới thiệu</b>
            <textarea name="txtContent" class="form-control" id="editor1"></textarea>
            <b>Mã tài khoản</b>
            <select name="matk" class="form-control" >
              @foreach($taikhoan as $row)
              @if($row->TinhTrang=='3')
              <option value={{$row["MaTaiKhoan"]}}> {{$row["username"]}}
              </option>
              @endif
              @endforeach  
            </select>
            <b>CMND</b>
            <input type="text" name="cmnd" class="form-control">
            <b>Bằng cấp</b>
            <input type="text" name="bangcap" class="form-control">
            <b>Địa chỉ</b>
            <input type="text" name="diachi" class="form-control">
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
{{--      <th>Mã Bác Sĩ</th>

 --}} 
<th>Hình Ảnh</th>
  <th>Tên Bác Sĩ</th>
 <th>SDT</th>
 <th>Năm Sinh</th>
 
 <th>Giới Thiệu</th>
 <th>Tình Trạng</th>
 <th>Mã tài khoản</th>
 <th>CMND</th>
 <th>Địa chỉ</th>
 <th>Bằng cấp</th>
 <th>Thao tác</th>
</tr> 
</thead>
<tbody>
  @foreach($bacsi as $row)
{{--   <tr><td>{{$row['MaBacSi']}}</td>
 --}}    
  <td>
   <img style="width: 210px;height: 150px;" src=  {{asset('source/assets/dest/images/doctor/'.$row['HinhAnh'])}}>
 </td>
 <td>{{$row['TenBacSi']}}</td>
 <td>{{$row['SDT']}}</td>
 <td>{{$row['NamSinh']}}</td>
 
 <td>
   <textarea  rows="5" cols="40" readonly="readonly" >{{$row['GioiThieu']}}</textarea>
 </td>
 <td>{{$row['TinhTrang']}}</td>
 <td>

  @foreach($taikhoan as $tk)
  @if($tk["MaTaiKhoan"]==$row['MaTaiKhoan'])
  {{$tk["ID"]}}
  @endif
  @endforeach 
</td>

<td>{{$row['CMND']}}</td>
<td>{{$row['DiaChi']}}</td>
<td>{{$row['BangCap']}}</td>
<td>
  <table>
    <tr><td>
     <button type="button" class="btn btn-danger" id="{{$row['MaBacSi']}}" onclick="ConfirmDelete(this.id)"  style="margin-top: -15px;" ><i class="fa fa-remove " style="font-size:20px"></i> </button>
   </td></tr><tr>
    <td>
      <button type="button" style="margin-top: -15px;margin-right: 15px;" id="{{$row['MaBacSi']}}" class="btn btn-primary" onclick="ajax_modal(this.id)">
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