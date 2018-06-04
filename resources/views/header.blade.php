    <header role="banner">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-5">
              <ul class="social list-unstyled">
                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li><a href="#"><span class="fa fa-instagram"></span></a></li>
              </ul>
            </div>
            <div class="col-md-6 col-sm-6 col-7 text-right">
              <p class="mb-0">
                <a href="#" class="cta-btn" data-toggle="modal" data-target="#modalAppointment">Đặt lịch hẹn ngay</a>
    
                <a href="#" class="cta-btn" data-toggle="modal" data-target="#modalLogin">Đăng nhập</a></p>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="index.html">NHA KHOA MT<span>+</span>  </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="{{route('trang-chu')}}">Trang chủ</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dịch vụ</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  @foreach($loaidichvu as $loaidv)
                  <a class="dropdown-item" href="#">{{$loaidv->TenLoaiDichVu}}</a>
                  @endforeach
                </div>

              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="doctors.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bác sĩ</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="doctors.html">Tìm bác sĩ</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="news.html">Tin Tức</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('lienhe')}}">Liên Hệ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->