<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taikhoan;
use Illuminate\Support\Facades\Auth;
use App\User;
class FE_DangNhapController extends Controller
{
    public function postLogin(Request $req)
    {
    	$this->validate($req,
		[
			'username'=>'required|username'
			'password'=>'required|min:6|max:20'
		],
		[
			'username.required'=>'Vui lòng nhập tài khoản',
			'password.required'=>'Vui lòng nhập mật khẩu'
		]

		);
		$scredentials= array('username'=>$req->username,'password'=>$req->password,'Quyen'=>1);
		if(Auth::attempt($scredentials))
			{
				return redirect()->back()->with('thanhcong','Đăng nhập thành công');
			}
			else{
				//return redirect()->back()->with('thanhcong','Đăng nhập không thành công');
				return view('page.khachhang');
			}
    }
    public function getLogin(){
        return view('page.khachhang');
    }
}
