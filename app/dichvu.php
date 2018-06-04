<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dichvu extends Model
{
    //
	protected $table='dichvu';
	public $timestamps = false;
	protected $primaryKey = 'MaDichVu';
	public function binhluan()
	{
		return $this->hasMany('App\binhluan','MaDichVu','MaDichVu');
	}
	public function loaidichvu()
	{
		return $this->belongsTo('App\loaidichvu','MaLoaiDichVu','MaLoaiDichVu');
	}
	public function chitietdichvu()
	{
		return $this->hasMany('App\chitietdichvu','MaDichVu','MaDichVu');
	}
}
