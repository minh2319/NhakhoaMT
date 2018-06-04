
@extends('master')
@section('content')
<div class="container" style="width:100%; background-image: url('source/assets/dest/images/slide/uni.jpg');">
    <!-- END slider -->
<div style="height: 500px; opacity: 0.8; width: 350px;  margin-left: 400px; margin-bottom: 30px; background-color: #fff ;  ">
	<div class="row"> @if (session('thongbao'))
                  <SCRIPT type='text/javascript'> 
                      setTimeout(function() { alert("{{session('thongbao')}}"); }, 200);
                  </SCRIPT>
                      @endif 
              </div>
	<h2 style="text-align: center; padding-top: 15px;">Xác nhận lịch hẹn</h2>
	<div style="margin-left: 25px; padding-top: 35px;" >
	<label for="appointment_name" class="text-black">Họ tên : {{$name}}</label></br>
	<label for="appointment_name" class="text-black">Số điện thoại : {{$phone}}</label></br>
	<label for="appointment_name" class="text-black">Email : {{$email}}</label></br>
	<label for="appointment_name" class="text-black">Bác sĩ chọn : {{$doctor}}</label></br>
	<label for="appointment_name" class="text-black">Ngày khám : {{$datetime}}</label></br>
	<label for="appointment_name" class="text-black">Tình trạng : {{$message}}</label></br>
	</div>
</div>
</div>
@endsection