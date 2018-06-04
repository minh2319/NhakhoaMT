<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class binhluan extends Model
{
    //
	protected $table='binhluan';
	public $timestamps = false;
	protected $primaryKey = 'MaBinhLuan';


	public function tintuc()
	{
		return $this->belongsTo('App\tintuc','MaTinTuc','MaTinTuc');
	}
	public function dichvu()
	{
		return $this->belongsTo('App\dichvu','MaDichVu','MaDichVu');
	}
	public function taikhoan()
	{
		return $this->belongsTo('App\taikhoan','MaTaiKhoan','MaTaiKhoan');
	}
}
