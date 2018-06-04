<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdichvu extends Model
{
    //
	protected $table='chitietdichvu';
	public $timestamps = false;
	protected $primaryKey = 'MaChiTietDichVu';

	public function hoadon()
	{
		return $this->belongsTo('App\hoadon','MaHoaDon','MaHoaDon');
	}
	public function dichvu()
	{
		return $this->belongsTo('App\dichvu','MaDichVu','MaDichVu');
	}
}
