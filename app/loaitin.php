<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{
    //
	protected $table='loaitin';
	public $timestamps = false;
	protected $primaryKey = 'MaLoaiTin';

	public function tintuc()
	{
		return $this->hasMany('App\tintuc','MaLoaiTin','MaLoaiTin');
	}
}
