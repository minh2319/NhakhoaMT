<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bacsi extends Model
{
    //
	protected $table='bacsi';
	protected $primaryKey = 'MaBacSi';
	public $timestamps = false;

	public function lichkham()
	{
		return $this->hasMany('App\lichkham','MaBacSi','MaBacSi');
	}
	public function hoadon()
	{
		return $this->hasMany('App\hoadon','MaBacSi','MaBacSi');
	}
	public function lichlamviec()
	{
		return $this->hasMany('App\lichlamviec','MaBacSi','MaBacSi');
	}
	public function taikhoan()
	{
		return $this->hasOne('App\taikhoan','MaTaiKhoan','MaTaiKhoan');
	}
}
