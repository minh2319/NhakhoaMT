<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    //
	protected $table='khachhang';
	public $timestamps = false;
	protected $primaryKey = 'MaKhachHang';


	public function xephang()
	{
		return $this->belongsTo('App\xephang','MaXepHang','MaXepHang');
	}
	public function taikhoan()
	{
		return $this->hasOne('App\taikhoan','MaTaiKhoan','MaTaiKhoan');
	}
	public function hoadon()
	{
		return $this->hasMany('App\hoadon','MaKhachHang','MaKhachHang');
	}
}
