@extends('admin.layout.master')
@section('content')
@if (session('status'))
<SCRIPT type='text/javascript'> 
  setTimeout(function() { alert("{{session('status')}}"); }, 200);
</SCRIPT>
@endif
<!-- Nút button và From popup Thêm-->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalThem">
  Thêm 
</button>
<!-- Modal Them -->
<div class="modal fade" id="ModalThem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
      <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
          <label for="username" class="col-md-4 control-label">Name</label>

          <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

            @if ($errors->has('username'))
            <span class="help-block">
              <strong>{{ $errors->first('username') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="col-md-4 control-label">Password</label>

          <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

          <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
              Register
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>               
<!-- Kết thúc Nút button và From popup Thêm-->
<!--Tự động load SQL vào Table -->
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
       <th>Mã tài khoản</th>
       <th>ID</th>
       <th>Quyền</th>
       <th>Tình Trạng</th>
       <th>Thao tác</th>
     </tr>
   </thead>
   <tfoot>
    <tr>
      <th>Mã tài khoản</th>
      <th>ID</th>
      <th>Quyền</th>
      <th>Tình Trạng</th>
      <th>Thao tác</th>
    </tr>
  </tfoot>
  <tbody>
    @foreach($taikhoan as $row)
    <tr><td>{{$row['MaTaiKhoan']}}</td>
      <td>{{$row['username']}}</td>
      <td>{{$row['Quyen']}}</td>
      <td>
        @if($row["TinhTrang"]==0)
        <b style="color: red">Khóa</b>
        @else
        <b style="color: green">Kích Hoạt</b>
        @endif
      </td>      <td>
       <table>
        <tr>
          <td>
            <button type="button" style="margin-top: -15px;" id="{{$row['MaTaiKhoan']}}" class="btn btn-primary" onclick="ajax_an_ctpl(this.id)">
             @if($row["TinhTrang"]==1)
             <b style="color: black">Khóa</b>
             @else
             Kích Hoạt
             @endif
           </button>
         </td></tr>
       </table>
     </td>
   </tr> 
   @endforeach
 </tbody>
</table>
</div>
<script language="javascript">
  function ajax_an_ctpl(id)
  {
    window.location.replace('suatinhtrang/'+id); 
  }
</script>
<!--Kết thúc Tự động load SQL vào Table -->
@endsection