<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Nha khoa MT </title>
	<base href="{{asset('')}}">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300, 400, 700" rel="stylesheet">

	<link rel="stylesheet" href="source/assets/dest/css/bootstrap.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" href="source/assets/dest/css/owl.carousel.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="source/assets/dest/css/jquery.timepicker.css">
	<link rel="stylesheet" href="source/assets/dest/css/jquery.datetimepicker.min.css">

	
	<link rel="stylesheet" href="source/assets/dest/fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="source/assets/dest/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="source/assets/dest/css/style.css">
</head>
<body>
		@include('header')
	<div class="rev-slider">
		@yield('content')
	</div> <!-- .container -->
		@include('footer')

	<script src="source/assets/dest/js/jquery-ui/external/jquery/jquery.js"></script>
	<script src="source/assets/dest/js/jquery-3.2.1.min.js"></script>
	<script src="source/assets/dest/js/popper.min.js"></script>
	<script src="source/assets/dest/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/js/owl.carousel.min.js"></script>
	<script src="source/assets/dest/js/bootstrap-datepicker.js"></script>
	<script src="source/assets/dest/js/jquery.timepicker.min.js"></script>
	<script src="source/assets/dest/js/jquery.waypoints.min.js"></script>
	<script src="source/assets/dest/js/main.js"></script>
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/js/jquery.datetimepicker.full.js"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
		
	})
	</script>


</body>
</html>