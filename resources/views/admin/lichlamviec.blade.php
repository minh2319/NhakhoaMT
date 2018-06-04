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
       <th>Mã Lịch</th>
       <th>Tên Bác Sĩ</th>
       <th>Tháng</th>
       <th>Năm</th>
     </tr>
   </thead>
   <tfoot>
    <tr>
     <th>Mã Lịch</th>
     <th>Tên Bác Sĩ</th>
     <th>Tháng</th>
     <th>Năm</th>
   </tr>
 </tfoot>
 <tbody>
  @foreach($lichlamviec as $row)
  <tr><td>{{$row['MaLich']}}</td>
    <td>@foreach($bacsi as $tk)
  @if($tk["MaBacSi"]==$row['MaBacSi'])
  {{$tk["TenBacSi"]}}
  @endif
  @endforeach </td>
    <td>{{$row['Thang']}}</td>
    <td>{{$row['Nam']}}</td>
  </tr> 
  @endforeach
</tbody>
</table>
</div>
<script language="javascript">

  <!--Kết thúc Tự động load SQL vào Table -->
  @endsection