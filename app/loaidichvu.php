<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaidichvu extends Model
{
    //
	protected $primaryKey = 'MaLoaiDichVu';
	protected $table='loaidichvu';
	public $timestamps = false;


	public function dichvu()
	{
		return $this->hasMany('App\dichvu','MaLoaiDichVu','MaLoaiDichVu');
	}
}
