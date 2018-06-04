 @if (Auth::guest())
         <script type="text/javascript">
    window.location = "{{url('/')}}";//here double curly bracket
  </script>
  @endif
<!DOCTYPE html>
@include('admin.layout.header')
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
@include('admin.layout.narbar')
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
    @yield('content')
      <!-- Icon Cards-->
    
      <!-- Area Chart Example-->

        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
@include('admin.layout.footer')

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
@include('admin.layout.logout')

    <!-- Bootstrap core JavaScript-->
@include('admin.layout.js')

  </div>

</body>

</html>
