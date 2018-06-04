@extends('admin.layout.master')
@section('content')
@if (session('status'))
<SCRIPT type='text/javascript'> 
  setTimeout(function() { alert("{{session('status')}}"); }, 200);
</SCRIPT>
@endif
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Mã Lịch</th>
        <th>Tên bác sĩ</th>
        <th>Ngày khám</th>
        <th>Lời nhắn</th>
        <th>Trạng thái</th>
        <th>Tên khách hàng</th>
        <th>SDT</th>
        <th>Email</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Mã Lịch</th>
        <th>Tên bác sĩ</th>
        <th>Ngày khám</th>
        <th>Lời nhắn</th>
        <th>Trạng thái</th>
        <th>Tên khách hàng</th>
        <th>SDT</th>
        <th>Email</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($lichkham as $row)
      <tr><td>{{$row['MaLich']}}</td>
       <td>@foreach($bacsi as $bs)
        @if($bs["MaBacSi"]==$row['MaBacSi'])
        {{$bs["TenBacSi"]}}
        @endif
        @endforeach 
      </td>
      <td>{{$row['NgayKham']}}</td>
      <td>{{$row['LoiNhan']}}</td>
      <td>{{$row['TrangThai']}}</td>
      <td>{{$row['TenKhachHang']}}</td>
      <td>{{$row['SDT']}}</td>
      <td>{{$row['Email']}}</td>
   </tr> 
   @endforeach
 </tbody>
</table>
</div>

<!--Kết thúc Tự động load SQL vào Table -->
@endsection