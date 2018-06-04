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
         <b>Tên Khách hàng</b>
            <input type="text" name="tenkh" class="form-control">
           <b>Ngày Sinh</b>
            <input type="date" name="ngaysinh" class="form-control">
           <b>Địa chỉ</b>
            <input type="text" name="diachi" class="form-control">
            <b>SDT</b>
            <input type="text" name="sdt" class="form-control">
            <b>Email</b>
            <input type="email" name="email" class="form-control">
            <b>CMND</b>
            <input type="text" name="cmnd" class="form-control">
            <b>Tài khoản</b>
            <select name="matk" class="form-control" >
              @foreach($taikhoan as $row)
              @if($row["TinhTrang"]=='3')
              <option value={{$row["MaTaiKhoan"]}}> {{$row["ID"]}}
              </option>
              @endif
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
       <th>Mã khách hàng</th>
       <th>Tên khách hàng</th>
       <th>Ngày sinh</th>
       <th>Địa chỉ</th>
       <th>SDT</th>
       <th>Email</th>
       <th>CMND</th>
       <th>Mã tài khoản</th>
       <th>Điểm tích lũy</th>
       <th>Mã xếp hạng</th>
       <th>Mã giới thiệu</th>
       <th>Thao Tác</th>
     </tr>
   </thead>
   <tfoot>
    <tr>
     <th>Mã khách hàng</th>
     <th>Tên khách hàng</th>
     <th>Ngày sinh</th>
     <th>Địa chỉ</th>
     <th>SDT</th>
     <th>Email</th>
     <th>CMND</th>
     <th>Mã tài khoản</th>
     <th>Điểm tích lũy</th>
     <th>Mã xếp hạng</th>
     <th>Mã giới thiệu</th>
     <th>Thao Tác</th>
   </tr>
 </tfoot>
 <tbody>
  @foreach($khachhang as $row)
  <tr><td>{{$row['MaKhachHang']}}</td>
    <td>{{$row['TenKhachHang']}}</td>
    <td>{{$row['NgaySinh']}}</td>
    <td>{{$row['DiaChi']}}</td>
    <td>{{$row['SDT']}}</td>
    <td>{{$row['Email']}}</td>
    <td>{{$row['CMND']}}</td>
    <td>@foreach($taikhoan as $xh)
          @if($xh["MaTaiKhoan"]==$row['MaTaiKhoan'])
          {{$xh["ID"]}}
          @endif
          @endforeach </td>
    <td>{{$row['DiemTichLuy']}}</td>
     <td>

 @foreach($xephang as $xh)
          @if($xh["MaXepHang"]==$row['MaXepHang'])
          {{$xh["TenXepHang"]}}
          @endif
          @endforeach 
   </td>
    <td>{{$row['MaGioiThieu']}}</td>
    <td>
          <table>
            <tr>
            <td>
              <button type="button" style="margin-top: -15px;margin-right: 15px;" id="{{$row['MaKhachHang']}}" class="btn btn-primary" onclick="ajax_modal(this.id)">
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
 function ajax_modal(id)
  {
    $.get('ajaxmodal/'+id,function(data){$("#popupsua").html(data);
  });
    $("#ModalSua").modal()
  } 
</script>
<!--Kết thúc Tự động load SQL vào Table -->
@endsection