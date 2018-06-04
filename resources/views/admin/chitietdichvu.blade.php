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

       <th>Mã chi tiết Dịch Vụ</th>
       <th>Mã dịch vụ</th>
       <th>Mã hóa đơn</th>
     </tr>
   </thead>
   <tfoot>
    <tr>
     <th>Mã chi tiết Dịch Vụ</th>
     <th>Mã dịch vụ</th>
     <th>Mã hóa đơn</th>
   </tfoot>
   <tbody>
    @foreach($chitietdichvu as $row)
    {{--   <tr><td>{{$row['MaBacSi']}}</td>--}}   
     <td> 
       {{$row['MaChiTietDichVu']}}
     </td>
       <td> 
    @foreach($dichvu as $mdv)
    @if($mdv["MaDichVu"]==$row['MaDichVu'])
    {{$mdv["TenDichVu"]}}
    @endif
    @endforeach
  </td>
     <td>
      {{$row['MaHoaDon']}}
    </td>
  </tr> 
  @endforeach
</tbody>
</table>
</div>
<!--Kết thúc Tự động load SQL vào Table -->
@endsection