@extends('admin.layout.master')
@section('content')
@if (session('status'))
<SCRIPT type='text/javascript'> 
  setTimeout(function() { alert("{{session('status')}}"); }, 200);
</SCRIPT>
@endif
<!-- Nút button và From popup Thêm-->
<!-- Button trigger modal -->

<!-- Modal Them -->

<!-- Modal Sua -->

<!--Tự động load SQL vào Table -->
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
{{--        <th>Mã Bác Sĩ</th>
 --}}<th>Tên Dịch Vụ</th>
 <th>Tên Tin Tức</th>
 <th>Nội Dung</th>
 <th>Tên Tài Khoản</th>
 <th>Tình Trạng</th>
 <th>Ngày Bình Luận</th>
 <th>Thao Tác</th>
</tr>
</thead>
<tfoot>
  <tr>
{{--      <th>Mã Bác Sĩ</th>
 --}}     <th>Tên Dịch Vụ</th>
 <th>Tên Tin Tức</th>
 <th>Nội Dung</th>
 <th>Tên Tài Khoản</th>
 <th>Tình Trạng</th>
 <th>Ngày Bình Luận</th>
 <th>Thao Tác</th>
</tr>
</tfoot>
<tbody>
  @foreach($binhluan as $row)
  {{--   <tr><td>{{$row['MaBacSi']}}</td>--}}   
   <td> 
    @foreach($dichvu as $mdv)
    @if($mdv["MaDichVu"]==$row['MaDichVu'])
    {{$mdv["TenDichVu"]}}
    @endif
    @endforeach
  </td>

  <td>
    @foreach($tintuc as $mtt)
    @if($mtt["MaTinTuc"]==$row['MaTinTuc'])
    {{$mtt["TenTinTuc"]}}
    @endif
    @endforeach 
  </td>  

  <td>
   <textarea  rows="3" cols="40" readonly="readonly" >{{$row['NoiDung']}}</textarea>
 </td>
 <td>
   @foreach($taikhoan as $tk)
   @if($tk["MaTaiKhoan"]==$row['MaTaiKhoan'])
   {{$tk["ID"]}}
   @endif
   @endforeach 
 </td>
 <td>
  @if($row["TinhTrang"]==0)
  <b style="color: red">Ẩn</b>
  @else
  <b style="color: green">Hiện</b>
  @endif
</td>

<td>{{$row['NgayBinhLuan']}}</td>

<td>
  <table>
    <tr>
      <td>
        <button type="button" style="margin-top: -15px;" id="{{$row['MaBinhLuan']}}" class="btn btn-primary" onclick="ajax_an_ctpl(this.id)">
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
</script>
<!--Kết thúc Tự động load SQL vào Table -->
@endsection