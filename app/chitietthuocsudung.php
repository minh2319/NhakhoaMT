<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietthuocsudung extends Model
{
    //
	protected $table='chitietthuocsudung';
	public $timestamps = false;
	protected $primaryKey = 'MaChiTietThuocSD';

	public function hoadon()
	{
		return $this->belongsTo('App\hoadon','MaHoaDon','MaHoaDon');
	}
	public function thuoc()
	{
		return $this->belongsTo('App\thuoc','MaThuoc','MaThuoc');
	}
}
