<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    //
	protected $table='hoadon';
	public $timestamps = false;
	protected $primaryKey = 'MaHoaDon';


	public function bacsi()
	{
		return $this->belongsTo('App\bacsi','MaBacSi','MaBacSi');
	}
	public function chitietdichvu()
	{
		return $this->hasMany('App\chitietdichvu','MaHoaDon','MaHoaDon');
	}
	public function khachhang()
	{
		return $this->belongsTo('App\khachhang','MaKhachHang','MaKhachHang');
	}
	public function chitietthuocsudung()
	{
		return $this->hasMany('App\dichvu','MaHoaDonMaHoaDon','MaHoaDon');
	}
}

