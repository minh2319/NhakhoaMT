<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\taikhoan;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
class LoginController extends Controller
{
	public function popup(){
		return view("admin.loginpopup");
	}
    public function username()
    {
        return 'username';
    }
    public function postLogin(Request $request) {
        $data=[
            'username'=>$request->username,
            'password'=>$request->password,
        ];
        if(Auth::attempt($data)){
            return redirect()->intended('admin/taikhoan/danhsach');
        }else{
            $errors = new MessageBag(['errorlogin' => 'Tên đăng nhập hoặc mật khẩu không đúng']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
}
