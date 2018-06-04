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
            <b>Tên Bác sĩ</b>
            <select name="mabs" class="form-control" >
              @foreach($bacsi as $row)
              <option value={{$row["MaBacSi"]}}> {{$row["TenBacSi"]}}
              </option>
              @endforeach  
            </select>            <b>Số tiền</b>
            <input type="text" name="sotien" class="form-control">
           <b>Ghi chú</b>
            <input type="text" name="ghichu" class="form-control">
           <b>Phương pháp DT</b>
            <input type="text" name="ppdt" class="form-control">
            <b>Kết quả DT</b>
            <input type="text" name="kqdt" class="form-control">
            <b>Tên khách hàng</b>
            <select name="makh" class="form-control">
              @foreach($khachhang as $row)
              <option value={{$row["MaKhachHang"]}}> {{$row["TenKhachHang"].'--'.$row["CMND"]}}
              </option>
              @endforeach 
            </select>
           
            <b>Mã giới thiệu</b>
            <input type="text" name="magioithieu" class="form-control">
            <b>Phần trăm giảm giá</b>
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
        <th>Mã hóa đơn</th>
        <th>Tên bác sĩ</th>
        <th>Số tiền</th>
        <th>Ghi chú</th>
        <th>Phương pháp DT</th>
        <th>Kết quả DT</th>
        <th>Tên Khách hàng</th>
        <th>Ngày</th>
        <th>Mã giới thiệu</th>
        <th>Phần trăm giảm </th>
        <th>Thao Tác</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Mã hóa đơn</th>
        <th>Tên bác sĩ</th>
        <th>Số tiền</th>
        <th>Ghi chú</th>
        <th>Phương pháp DT</th>
        <th>Kết quả DT</th>
        <th>Tên Khách hàng</th>
        <th>Ngày</th>
        <th>Mã giới thiệu</th>
        <th>Phần trăm giảm </th>
        <th>Thao Tác</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($hoadon as $row)
      <tr><td>{{$row['MaHoaDon']}}</td>
         <td>@foreach($bacsi as $bs)
        @if($bs["MaBacSi"]==$row['MaBacSi'])
        {{$bs["TenBacSi"]}}
        @endif
        @endforeach 
      </td>
        <td>{{$row['SoTien']}}</td>
        <td>{{$row['GhiChu']}}</td>
        <td>{{$row['PhuongPhapDT']}}</td>
        <td>{{$row['KetQuaDT']}}</td>
        <td>
          @foreach($khachhang as $kh)
          @if($kh["MaKhachHang"]==$row['MaKhachHang'])
          {{$kh["TenKhachHang"]}}
          @endif
          @endforeach 
        </td>
        <td>{{$row['Ngay']}}</td>
        <td>{{$row['MaGioiThieu']}}</td>
        <td>{{$row['PhanTramGiamGia']}}</td>
        <td>
          <table>
            <tr><td>
             <button type="button" class="btn btn-danger" id="{{$row['MaHoaDon']}}" onclick="ConfirmDelete(this.id)"  style="margin-top: -15px;" ><i class="fa fa-remove " style="font-size:20px"></i> </button>
           </td></tr><tr>
            <td>
              <button type="button" style="margin-top: -15px;margin-right: 15px;" id="{{$row['MaHoaDon']}}" class="btn btn-primary" onclick="ajax_modal(this.id)">
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