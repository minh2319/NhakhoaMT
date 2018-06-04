<link rel="stylesheet" href="source/assets/dest/css/jquery.datetimepicker.min.css">
@extends('master')

@section('content')
<section class="home-slider owl-carousel">
      @foreach($slide as $sld)
      <div class="slider-item" style="background-image: url('source/assets/dest/images/slide/{{$sld->Hinh}}');">
        
        <div class="container">
          <div class="row slider-text align-items-center">
            <div class="col-md-7 col-sm-12 element-animate">
              <h1>{{$sld->Ten}}</h1>
              <p>{{$sld->NoiDung}}.</p>
            </div>
          </div>
        </div>

      </div>
      @endforeach


    </section>
    <!--slider-->


    <section class="container home-feature mb-5">
      <div class="row">
        <div class="col-md-4 p-0 one-col element-animate">
          <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
            <span class="icon flaticon-hospital-bed"></span>
            <h2 style="text-align: center">Khẩn Cấp</h2>
            <div>
              <h3 style="text-align: center"><img src="source/assets/dest/images/icons8-hospital-48.png"></h3>
            </div>
            <p>Nếu bạn cần một trường hợp khẩn cấp, hãy gọi chúng tôi ngay, chúng tôi làm việc 7 ngày 1 tuần, và luôn có đầy đủ các buổi hẹn trong ngày cho khách hàng lựa chọn.</p>
          </div>
          <a href="{{route('lienhe')}}" class="btn-more">Liên Hệ</a>
        </div>
        <div class="col-md-4 p-0 two-col element-animate">
          <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
            <span class="icon flaticon-first-aid-kit"></span>
            <h2 style="text-align: center">Thời Gian Phục Vụ</h2>
            <div>
              <h4 style="text-align: center"><img src="source/assets/dest/images/icons8-alarm-clock-48.png"></h4>
            </div>
            <p>Chúng tôi mở cửa 7 ngày 1 tuần, khách hàng có thể đặt lịch hẹn theo khung giờ phù với mình.</p>
            <table id="tablepress-4" style="color:white" class="tablepress tablepress-id-4">
              <tbody>
                <tr class="row-1">
                  <td class="column-1">Monday - Friday</td><td class="column-2">8.00 AM - 7.00 PM</td>
                </tr>
                <tr class="row-2">
                  <td class="column-1">Saturday</td><td class="column-2">9.00 AM - 5.00 PM</td>
                </tr>
                <tr class="row-3">
                  <td class="column-1">Sunday</td><td class="column-2">9.00 AM - 3.00 PM</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-4 p-0 three-col element-animate">
          <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
            <span class="icon flaticon-hospital"></span>
            <h2 style="text-align: center">Đặt Lịch Online</h2>
            <div>
              <h5 style="text-align: center"><img src="source/assets/dest/images/icons8-calendar-48.png"></h5>
            </div>
            <p>Khách hàng có thể đặt lịch nhanh chóng và dễ dàng trên website ngay bây giờ , nhấn đặt lịch để tiến hành có thể chọn khung giờ cũng như bác sĩ.</p>
          </div>
          <a href="#" class="btn-more" data-toggle="modal" data-target="#modalAppointment">Đặt lịch</a>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section stretch-section">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">Tại Sao Bạn Nên Chọn Chúng Tôi</h2>
            <p class="mb-0 lead">Chúng tôi luôn tìm đầy đủ mọi cách để mang đến cho khách hàng sự thoải mái tốt nhất.</p>
          </div>
        </div>
        <div class="row align-items-center">
          
          <div class="col-md-6 stretch-left-1 element-animate" data-animate-effect="fadeInLeft">
            <a href="#" class="video"><img src="source/assets/dest/images/img_1.jpg" alt="" class="img-fluid"></a>
          </div>
          <div class="col-md-6 stretch-left-1-offset pl-md-5 pl-0 element-animate" data-animate-effect="fadeInLeft">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="media d-block media-feature text-center">
                  <span class="icon flaticon-hospital"></span>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Tận Tình</h3>
                    <p>Đội ngũ nhân viên chăm sóc chu đáo, tận tình.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="media d-block media-feature text-center">
                  <span class="icon flaticon-first-aid-kit"></span>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Dịch Vụ </h3>
                    <p>Dịch vụ đầy đủ, sở hữu trang thiết bị hiện đại nhất.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="media d-block media-feature text-center">
                  <span class="icon flaticon-hospital-bed"></span>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Giá Cả</h3>
                    <p>Luôn cho khách hàng giá tốt nhất và có nhiều ưu đãi, khuyến mãi.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="media d-block media-feature text-center">
                  <span class="icon flaticon-doctor"></span>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Đội ngũ Bác Sĩ</h3>
                    <p>Luôn chuyên nghiệp, tận tình và giàu kinh nghiệm.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section custom-tabs">
      <div class="container">
        <div class="row">

          <div class="col-md-4 border-right element-animate">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span>01</span> Amenities</a>
              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span>02</span> Medical Services</a>
              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><span>03</span> Patient Services</a>
              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span>04</span> Expert Doctors</a>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-7 element-animate">
            
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <span class="icon flaticon-hospital"></span>
                <h2 class="text-primary">Amenities</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                <p><a href="#" class="btn btn-primary">Learn More</a></p>
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <span class="icon flaticon-first-aid-kit"></span>
                <h2 class="text-primary">Medical Services</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                <p><a href="#" class="btn btn-primary">Learn More</a></p>
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <span class="icon flaticon-hospital-bed"></span>
                <h2 class="text-primary">Patient Services</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                <p><a href="#" class="btn btn-primary">Learn More</a></p>
              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <span class="icon flaticon-doctor"></span>
                <h2 class="text-primary">Expert Doctors</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                <p><a href="#" class="btn btn-primary">Learn More</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">ĐỘI NGŨ BÁC SĨ</h2>
            <p class="mb-0 lead">Chúng tôi sở hữu đội ngũ bác sĩ chuyên nghiệp, tận tình, được đào tạo ở môi trường tốt nhất có đấy đủ bằng cấp quốc tế.</p>
          </div>
        </div>
        <div class="row element-animate">
          <div class="major-caousel js-carousel-1 owl-carousel">
            @foreach($doctor as $dt)
            <div>
              <div class="media d-block media-custom text-center">
                <img src="source/assets/dest/images/doctor/{{$dt->HinhAnh}}" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">{{$dt->TenBacSi}}</h3>
                  <p>{{$dt->BangCap}}.c</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
              
            </div>
            @endforeach
            <div>
              <div class="media d-block media-custom text-center">
                <img src="source/assets/dest/images/doctor_1.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Carl Smith</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="source/assets/dest/images/doctor_2.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Janice Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="source/assets/dest/images/doctor_3.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Jean Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="source/assets/dest/images/doctor_4.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Jessica Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>

            <div>
              <div class="media d-block media-custom text-center">
                <img src="source/assets/dest/images/doctor_1.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Carl Smith</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="source/assets/dest/images/doctor_2.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Janice Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="source/assets/dest/images/doctor_3.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Jean Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <img src="source/assets/dest/images/doctor_4.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <h3 class="mt-0 text-black">Dr. Jessica Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p>
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>

          </div>
          <!-- END slider -->
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          <div class="col-md-8 text-center mb-5">
            <h2 class="text-uppercase heading border-bottom mb-4">Tin Tức &amp; Sự Kiện</h2>
            <p class="mb-0 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
          </div>
        </div>
        <div class="row element-animate">
          <div class="major-caousel js-carousel-2 owl-carousel">
            <div>
              <div class="media d-block media-custom text-left">
                <img src="source/assets/dest/images/img_thumb_1.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <span class="meta-post">December 2, 2017</span>
                  <h3 class="mt-0 text-black"><a href="#" class="text-black">Lorem ipsum dolor sit amet elit</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p class="clearfix">
                    <a href="#" class="float-left">Read more</a>
                    <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 8</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-left">
                <img src="source/assets/dest/images/img_thumb_2.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <span class="meta-post">December 2, 2017</span>
                  <h3 class="mt-0 text-black"><a href="#" class="text-black">Lorem ipsum dolor sit amet elit</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p class="clearfix">
                    <a href="#" class="float-left">Read more</a>
                    <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 2</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-left">
                <img src="source/assets/dest/images/img_thumb_3.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <span class="meta-post">December 2, 2017</span>
                  <h3 class="mt-0 text-black"><a href="#" class="text-black">Lorem ipsum dolor sit amet elit</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p class="clearfix">
                    <a href="#" class="float-left">Read more</a>
                    <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 5</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-left">
                <img src="source/assets/dest/images/img_thumb_4.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <span class="meta-post">December 2, 2017</span>
                  <h3 class="mt-0 text-black"><a href="#" class="text-black">Lorem ipsum dolor sit amet elit</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p class="clearfix">
                    <a href="#" class="float-left">Read more</a>
                    <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 7</a>
                  </p>
                </div>
              </div>
            </div>

            <div>
              <div class="media d-block media-custom text-left">
                <img src="source/assets/dest/images/img_thumb_1.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <span class="meta-post">December 2, 2017</span>
                  <h3 class="mt-0 text-black"><a href="#" class="text-black">Lorem ipsum dolor sit amet elit</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p class="clearfix">
                    <a href="#" class="float-left">Read more</a>
                    <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 1</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-left">
                <img src="source/assets/dest/images/img_thumb_2.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <span class="meta-post">December 2, 2017</span>
                  <h3 class="mt-0 text-black"><a href="#" class="text-black">Lorem ipsum dolor sit amet elit</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p class="clearfix">
                    <a href="#" class="float-left">Read more</a>
                    <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 4</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-left">
                <img src="source/assets/dest/images/img_thumb_3.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <span class="meta-post">December 2, 2017</span>
                  <h3 class="mt-0 text-black"><a href="#" class="text-black">Lorem ipsum dolor sit amet elit</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p class="clearfix">
                    <a href="#" class="float-left">Read more</a>
                    <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 12</a>
                  </p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-left">
                <img src="source/assets/dest/images/img_thumb_4.jpg" alt="Image Placeholder" class="img-fluid">
                <div class="media-body">
                  <span class="meta-post">December 2, 2017</span>
                  <h3 class="mt-0 text-black"><a href="#" class="text-black">Lorem ipsum dolor sit amet elit</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <p class="clearfix">
                    <a href="#" class="float-left">Read more</a>
                    <a href="#" class="float-right meta-chat"><span class="ion-chatbubble"></span> 14</a>
                  </p>
                </div>
              </div>
            </div>

          </div>
          <!-- END slider -->
        </div>
      </div>
    </section>
    <!-- END section -->





















	<!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @if(count($errors)>0)
          <ul>
            @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>
            @endforeach
          </ul>
          @endif
          <div class="modal-body">
            <form action="{{route('datlich')}}" method="post" >
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="row">@if (session('success'))
                  <SCRIPT type='text/javascript'> 
                      setTimeout(function() { alert("{{session('success')}}"); }, 200);
                  </SCRIPT>
                              @endif
              </div>
              <div class="form-group">
                <label for="appointment_name" class="text-black">Họ tên</label>
                <input type="text" name="name" required="required" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_name" class="text-black">Số điện thoại</label>
                <input type="number" name="phone" required="required" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="email" name="email" required="required" class="form-control" id="appointment_email">
              </div>
              <div class="container">
                  <div class="row">
                        <div class="form-group">
                            <label for="appointment_datetime" class="text-black">Ngày và giờ hẹn</label>
                              <div class='input-group date' >
                                  <input type='text' name="datetime" required="required" value="" id="datetimepicker1" class="form-control"/>
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                        </div>
                  </div>
                        <script type="text/javascript">
                          $(function () {
                              $("#datetimepicker1").datetimepicker({
                                 format:'Y-m-d H:m'
                                
                              });
                          });
                        </script>
                  
              </div>
              <div class="form-group">
                <label for="appointment_name" class="text-black">Chọn bác sĩ</label>
                <select name="doctor" class="form-control" id="appointment_name">
                <option></option>
                @foreach($doctor as $dt)
                <option value="{{$dt->MaBacSi}}">{{$dt->TenBacSi}}</option>
                @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="appointment_message"  class="text-black">Tình trạng</label>
                <textarea name="message" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Đặt lịch" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Đăng nhập</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @if(count($errors)>0)
          <ul>
            @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>
            @endforeach
          </ul>
          @endif
          <div class="modal-body">
            <form action="{{route('dangnhap')}}" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="row">@if (session('thanhcong'))
                  <SCRIPT type='text/javascript'> 
                      setTimeout(function() { alert("{{session('thanhcong')}}"); }, 200);
                  </SCRIPT>
                              @endif
              </div>
              <div class="form-group">
                <label for="appointment_name" class="text-black">Tên tài khoản</label>
                <input type="text" class="form-control" name="username" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Password</label>
                <input type="password" class="form-control" name="password" id="appointment_email">
              </div>
              <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
@endsection
<link rel="stylesheet" href="source/assets/dest/css/jquery.datetimepicker.min.css">
<script src="source/assets/dest/js/jquery.js"></script>
<script src="source/assets/dest/js/jquery.datetimepicker.full.js"></script> 
<script src="source/assets/dest/js/jquery.datetimepicker.js"></script>  
<script src="source/assets/dest/js/bootstrap.min.js"></script>

