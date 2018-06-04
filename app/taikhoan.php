<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taikhoan extends Model
{
    //
	protected $table='taikhoan';
	public $timestamps = false;
	protected $primaryKey = 'MaTaiKhoan';
 public function getAuthPassword(){
            return $this->Pass;
  }
	public function binhluan()
	{
		return $this->hasMany('App\binhluan','MaTaiKhoan','MaTaiKhoan');
	}

	public function khachhang()
	{
		return $this->hasOne('App\khachhang','MaTaiKhoan','MaTaiKhoan');
	}
	public function bacsi()
	{
		return $this->hasOne('App\bacsi','MaTaiKhoan','MaTaiKhoan');
	}
}