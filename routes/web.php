<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);
Route::get('lienhe',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienhe'
]);
Route::get('trangkhachhang',[
	'as'=>'trangkhachhang',
	'uses'=>'FE_TrangKhachHangController@getTrangKH'
]);
Route::get('xacnhandatlich',[
	'as'=>'xacnhandatlich',
	'uses'=>'FE_TrangConfirmController@getTrangConfirmKH'
]);

Route::get('datlich',[
	'as'=>'datlich',
	'uses'=>'FE_DatLichHenController@getDatLich'
]);
Route::get('loaidichvu/{type}',[
	'as'=>'loaidichvu',
	'uses'=>'PageController@getLoaidichvu'
]);


Route::get('logintk','loginController@popup');
Route::post('login/check','loginController@postLogin');
Route::group(['prefix'=>'bacsi'],function(){
	Route::post('them','KhungGioLamViecController@them');
		Route::get('dangkylich','BE_DangkylichController@dangkylich');
		Route::get('them','BE_DangkylichController@them');

	});
Route::group(['prefix'=>'admin'],function(){		
	Route::group(['prefix'=>'taikhoan'],function(){
		Route::get('danhsach','TaiKhoanController@showlist');
		Route::post('them','TaiKhoanController@them');
		Route::get('xoa/{id}','TaiKhoanController@xoa');
		Route::post('sua/{id}','TaiKhoanController@sua');
		Route::get('suatinhtrang/{id}','TaiKhoanController@suatinhtrang');

	});
	Route::group(['prefix'=>'bacsi'],function(){
		Route::get('danhsach','BacSiController@showlist');
		Route::post('them','BacSiController@them');
		Route::get('xoa/{id}','BacSiController@xoa');
		Route::get('ajaxmodal/{id}','BacSiController@ajaxmodal');
		Route::post('sua/{id}','BacSiController@sua');
	});
	Route::group(['prefix'=>'dichvu'],function(){
		Route::get('danhsach','DichVuController@showlist');
		Route::post('them','DichVuController@them');
		Route::get('xoa/{id}','DichVuController@xoa');
		Route::post('sua/{id}','DichVuController@sua');
		Route::get('ajaxmodal/{id}','DichVuController@ajaxmodal');
	});

	Route::group(['prefix'=>'chitietdichvu'],function(){
		Route::get('danhsach','ChiTietDichVuController@showlist');
		Route::post('them','ChiTietDichVuController@them');
		Route::get('xoa/{id}','ChiTietDichVuController@xoa');
		Route::post('sua/{id}','ChiTietDichVuController@sua');
	});
	Route::group(['prefix'=>'chitietthuocsd'],function(){
		Route::get('danhsach','ChiTietThuocSDController@showlist');
		Route::post('them','ChiTietThuocSDController@them');
		Route::get('xoa/{id}','ChiTietThuocSDController@xoa');
		Route::post('sua/{id}','ChiTietThuocSDController@sua');
	});
	Route::group(['prefix'=>'gioithieu'],function(){
		Route::get('danhsach','GioiThieuController@showlist');
		Route::post('them','GioiThieuController@them');
		Route::get('xoa/{id}','GioiThieuController@xoa');
		Route::post('sua/{id}','GioiThieuController@sua');
		Route::get('ajaxmodal/{id}','GioiThieuController@ajaxmodal');

	});

	Route::group(['prefix'=>'hoadon'],function(){
		Route::get('danhsach','HoaDonController@showlist');
		Route::post('them','HoaDonController@them');
		Route::get('xoa/{id}','HoaDonController@xoa');
		Route::post('sua/{id}','HoaDonController@sua');
		Route::get('ajaxmodal/{id}','HoaDonController@ajaxmodal');

	});

	Route::group(['prefix'=>'binhluan'],function(){
		Route::get('danhsach','BinhLuanController@showlist');
		Route::post('them','BinhLuanController@them');
		Route::get('xoa/{id}','BinhLuanController@xoa');
		Route::get('suatinhtrang/{id}','BinhLuanController@suatinhtrang');
	});

	Route::group(['prefix'=>'khunggiolamviec'],function(){
		Route::get('danhsach','KhungGioLamViecController@showlist');
		Route::post('them','KhungGioLamViecController@them');
		Route::get('xoa/{id}','KhungGioLamViecController@xoa');
		Route::post('sua/{id}','KhungGioLamViecController@sua');
	});
	Route::group(['prefix'=>'lichkham'],function(){
		Route::get('danhsach','LichKhamController@showlist');
		Route::post('them','LichKhamController@them');
		Route::get('xoa/{id}','LichKhamController@xoa');
		Route::post('sua/{id}','LichKhamController@sua');
	});
	Route::group(['prefix'=>'khachhang'],function(){
		Route::get('danhsach','KhachHangController@showlist');
		Route::post('them','KhachHangController@them');
		Route::get('xoa/{id}','KhachHangController@xoa');
		Route::post('sua/{id}','KhachHangController@sua');
		Route::get('ajaxmodal/{id}','KhachHangController@ajaxmodal');

	});
	Route::group(['prefix'=>'lichlamviec'],function(){
		Route::get('danhsach','LichLamViecController@showlist');
		Route::post('them','LichLamViecController@them');
		Route::get('xoa/{id}','LichLamViecController@xoa');
		Route::post('sua/{id}','LichLamViecController@sua');
	});

	Route::group(['prefix'=>'loaidichvu'],function(){
		Route::get('danhsach','LoaiDichVuController@showlist');
		Route::post('them','LoaiDichVuController@them');
		Route::get('xoa/{id}','LoaiDichVuController@xoa');
		Route::get('ajaxmodal/{id}','LoaiDichVuController@ajaxmodal');
		Route::post('sua/{id}','LoaiDichVuController@sua');
	});

	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('danhsach','LoaiTinController@showlist');
		Route::post('them','LoaiTinController@them');
		Route::get('xoa/{id}','LoaiTinController@xoa');
		Route::post('sua/{id}','LoaiTinController@sua');
		Route::get('ajaxmodal/{id}','LoaiTinController@ajaxmodal');

	});

	Route::group(['prefix'=>'logo'],function(){
		Route::get('danhsach','LogoController@showlist');
		Route::post('them','LogoController@them');
		Route::get('xoa/{id}','LogoController@xoa');
		Route::post('sua/{id}','LogoController@sua');
		Route::get('ajaxmodal/{id}','LogoController@ajaxmodal');
		Route::get('suatinhtrang/{id}','LogoController@suatinhtrang');


	});

	Route::group(['prefix'=>'phongkham'],function(){
		Route::get('danhsach','PhongKhamController@showlist');
		Route::post('them','PhongKhamController@them');
		Route::get('xoa/{id}','PhongKhamController@xoa');
		Route::post('sua/{id}','PhongKhamController@sua');
		Route::get('ajaxmodal/{id}','PhongKhamController@ajaxmodal');

	});

	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@showlist');
		Route::post('them','SlideController@them');
		Route::get('xoa/{id}','SlideController@xoa');
		Route::post('sua/{id}','SlideController@sua');
		Route::get('suatinhtrang/{id}','SlideController@suatinhtrang');
		Route::get('ajaxmodal/{id}','SlideController@ajaxmodal');

	});

	Route::group(['prefix'=>'thuoc'],function(){
		Route::get('danhsach','ThuocController@showlist');
		Route::post('them','ThuocController@them');
		Route::get('xoa/{id}','ThuocController@xoa');
		Route::post('sua/{id}','ThuocController@sua');
		Route::get('ajaxmodal/{id}','ThuocController@ajaxmodal');

	});

	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','TinTucController@showlist');
		Route::post('them','TinTucController@them');
		Route::get('xoa/{id}','TinTucController@xoa');
		Route::post('sua/{id}','TinTucController@sua');
		Route::get('ajaxmodal/{id}','TinTucController@ajaxmodal');

	});

	Route::group(['prefix'=>'xephang'],function(){
		Route::get('danhsach','XepHangController@showlist');
		Route::post('them','XepHangController@them');
		Route::get('xoa/{id}','XepHangController@xoa');
		Route::post('sua/{id}','XepHangController@sua');
		Route::get('ajaxmodal/{id}','XepHangController@ajaxmodal');

	});

});
Route::post('login/check','loginController@postLogin')->name('dangnhap');
Route::get('login','loginController@popup')->name('popuplogin');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


