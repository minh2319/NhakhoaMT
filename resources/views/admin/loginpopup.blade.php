  <link href={{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }} rel="stylesheet">

  <link href={{ URL::asset('vendor/bootstrap/css/mdb.min.css') }} rel="stylesheet">
  <link href={{ URL::asset('vendor/bootstrap/css/style.min.css') }} rel="stylesheet">
  <script src={{ URL::asset('vendor/jquery/jquery.min.js') }}></script>
  <script src={{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>

  <!-- Core plugin JavaScript-->
  <style type="text/css">
  body {
   background-image: url("https://mdbootstrap.com/img/Photos/Others/img%20(42).jpg");

   /* Full height */
   height: 100%; 

   /* Center and scale the image nicely */
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;

   font-family: 'Varela Round', sans-serif;

 }
 .modal-login {
  width: 350px;
  color: #667eea;

}
.modal-login .modal-content {
  padding: 20px;
  border-radius: 5px;
  border: none;
}
.modal-login .modal-header {
  border-bottom: none;
  position: relative;
  justify-content: center;
}
.modal-login .close {
  position: absolute;
  top: -10px;
  right: -10px;
}
.modal-login h4 {
  color: #636363;
  text-align: center;
  font-size: 26px;
  margin-top: 0;
}
.modal-login .modal-content {
  color: #999;
  border-radius: 1px;
  margin-bottom: 15px;
  background: #fff;
  border: 1px solid #f3f3f3;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  padding: 25px;
}
.modal-login .form-group {
  margin-bottom: 20px;
}
.modal-login label {
  font-weight: normal;
  font-size: 13px;
}
.modal-login .form-control {
  min-height: 38px;
  padding-left: 5px;
  box-shadow: none !important;
  border-width: 0 0 1px 0;
  border-radius: 0;
}
.modal-login .form-control:focus {
  border-color: #ccc;
}
.modal-login .input-group-addon {
  max-width: 42px;
  text-align: center;
  background: none;
  border-width: 0 0 1px 0;
  padding-left: 5px;
  border-radius: 0;
}
.modal-login .btn {        
  font-size: 16px;
  font-weight: bold;
  background: #19aa8d;
  border-radius: 3px;
  border: none;
  min-width: 140px;
  outline: none !important;
}
.modal-login .btn:hover, .modal-login .btn:focus {
  background: #179b81;
}
.modal-login .hint-text {
  text-align: center;
  padding-top: 5px;
  font-size: 13px;
}
.modal-login .modal-footer {
  color: #999;
  border-color: #dee4e7;
  text-align: center;
  margin: 0 -25px -25px;
  font-size: 13px;
  justify-content: center;
}
.modal-login a {
  color: #fff;
  text-decoration: underline;
}
.modal-login a:hover {
  text-decoration: none;
}
.modal-login a {
  color: #19aa8d;
  text-decoration: none;
} 
.modal-login a:hover {
  text-decoration: underline;
}
.modal-login .fa {
  font-size: 21px;
}
.trigger-btn {
  display: inline-block;
  margin: 100px auto;
}
</style>
</head>
<body>
  <div class="text-center">
    <!-- Button HTML (to Trigger Modal) -->
  </div>
  <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-login ">
      <div class="modal-content">
        <div class="modal-header">        
          <h4 class="modal-title">Sign In</h4>

        </div>
        <div class="modal-body">
          <form action="login/check" method="post">
            <div class="form-group">
              <div class="input-group">
            {{ csrf_field() }}
          @if($errors->has('errorlogin'))
              {{$errors->first('errorlogin')}}
          @endif
            @if($errors->has('password'))
              <p style="color:red">{{$errors->first('password')}}</p>
            @endif

                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="id" placeholder="Username" required="required">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block btn-lg">Sign In</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>     
</body>


<script type="text/javascript">    $("#myModal").modal({backdrop: false})
</script>