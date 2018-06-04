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
       <th>Mã chi tiết thuốc sử dụng</th>
       <th>Mã hóa đơn</th>
       <th>Tên thuốc</th>
       <th>Số lượng</th>
     </tr>
   </thead>
   <tfoot>
    <tr>
      <th>Mã chi tiết thuốc sử dụng</th>
      <th>Mã hóa đơn</th>
      <th>Tên thuốc</th>
      <th>Số lượng</th>
    </tfoot>
    <tbody>
      @foreach($chitietthuocsudung as $row)
      {{--   <tr><td>{{$row['MaBacSi']}}</td>--}}   
       <td> 
         {{$row['MaChiTietThuocSD']}}
       </td>
       <td>
        {{$row['MaHoaDon']}}
      </td>
      <td> 
        @foreach($thuoc as $t)
        @if($t["MaThuoc"]==$row['MaThuoc'])
        {{$t["TenThuoc"]}}
        @endif
        @endforeach
      </td>
      <td>
        {{$row['SoLuong']}}
      </td>
    </tr> 
    @endforeach
  </tbody>
</table>
</div>
<!--Kết thúc Tự động load SQL vào Table -->
@endsection