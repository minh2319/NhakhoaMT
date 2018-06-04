<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class xephang extends Model
{
    //
	protected $table='xephang';
	public $timestamps = false;
	protected $primaryKey = 'MaXepHang';

	public function khachhang()
	{
		return $this->hasMany('App\khachhang','MaXepHang','MaXepHang');
	}
}
