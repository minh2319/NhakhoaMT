@extends('admin.layout.master')
@section('content')
@if (session('status'))
<SCRIPT type='text/javascript'> 
  setTimeout(function() { alert("{{session('status')}}"); }, 200);
</SCRIPT>
@endif
<!-- Nút button và From popup Thêm-->
<!-- Button trigger modal -->
<!--Tự động load SQL vào Table -->
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
       <th>Mã Khung Giờ</th>
       <th>Mã Lịch</th>
       <th>Thời gian bắt đầu</th>
       <th>Thời gian kết thúc</th>
     </tr>
   </thead>
   <tfoot>
    <tr>
     <th>Mã Khung Giờ</th>
     <th>Mã Lịch</th>
     <th>Thời gian bắt đầu</th>
     <th>Thời gian kết thúc</th>
   </tr>
 </tfoot>
 <tbody>
  @foreach($khunggiolamviec as $row)
  <tr><td>{{$row['MaKhungGioLamViec']}}</td>
    <td>{{$row['MaLich']}}</td>
    <td>{{$row['ThoiGianBD']}}</td>
    <td>{{$row['ThoiGianKT']}}</td>
  </tr> 
  @endforeach
</tbody>
</table>
</div>
<script language="javascript">

  <!--Kết thúc Tự động load SQL vào Table -->
  @endsection