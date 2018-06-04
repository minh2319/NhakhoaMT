  <nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top" id="mainNav" style="background: #020006;height: 50px;">
    <a class="navbar-brand" style="color:blue;">Admin Website</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive" >
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" >

       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Quản lý ">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-sitemap"></i>
          <span class="nav-link-text">Quản lý</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti">
          <li>
            <a href="../bacsi/danhsach">Bác sĩ</a>
          </li>
          <li>
            <a href="../binhluan/danhsach">Bình Luận</a>
          </li>
          <li>
            <a href="../chitietdichvu/danhsach">Chi tiết dịch vụ</a>
          </li>
          <li>
            <a href="../chitietthuocsd/danhsach">Chi tiết thuốc sd</a>
          </li>
          <li>
            <a href="../dichvu/danhsach">Dịch vụ</a>
          </li>
          <li>
            <a href="../gioithieu/danhsach">Giới thiệu</a>
          </li>
          <li>
            <a href="../hoadon/danhsach">
            Hóa đơn</a>
          </li>
          <li>
            <a href="../khachhang/danhsach">Khách hàng</a>
          </li>
          <li>
            <a href="../khunggiolamviec/danhsach">Khung giờ làm việc</a>
          </li>
          <li>
            <a href="../lichkham/danhsach">Lịch khám</a>
          </li>
          <li>
            <a href="../lichlamviec/danhsach">Lịch làm việc</a>
          </li>
          <li>
            <a href="../loaidichvu/danhsach">Loại dịch vụ</a>
          </li>
          <li>
            <a href="../loaitin/danhsach">Loại tin</a>
          </li>
          <li>
            <a href="../logo/danhsach">Logo</a>
          </li>
          <li>
            <a href="../phongkham/danhsach">Phòng khám</a>
          </li>
          <li>
            <a href="../slide/danhsach">Slide</a>
          </li>
          <li>
            <a href="{{url('admin/taikhoan/danhsach')}}">Tài khoản</a>
          </li>
          <li>
            <a href="../thuoc/danhsach">Thuốc</a>
          </li>
          <li>
            <a href="../tintuc/danhsach">Tin tức</a>
          </li>
          <li>
            <a href="../xephang/danhsach">Xếp Hạng</a>
          </li>
          <li>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
         @if (Auth::guest())
         <script type="text/javascript">
    window.location = "{{url('/')}}";//here double curly bracket
  </script>
  @else
  <li class="dropdown" style="margin-top: 5px;font-size: 20px;">
    <a href="#"  class="nav-link" style="color: #2F9599;" >
      {{ Auth::user()->username }} <span class="caret"></span>
    </a>
    <a  class="nav-link" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    <i class="fa fa-fw fa-sign-out" style="color: #F51616"></i>
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>

</li>
@endif
</li>
</ul>
<!-- Authentication Links -->


</div>
</nav>