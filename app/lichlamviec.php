<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lichlamviec extends Model
{
    //
	protected $table='lichlamviec';
	public $timestamps = false;
	protected $primaryKey = 'MaLich';


	public function bacsi()
	{
		return $this->belongsTo('App\bacsi','MaBacSi','MaBacSi');
	}
	public function khunggiolamviec()
	{
		return $this->hasMany('App\khunggiolamviec','MaLich','MaLich');
	}
}
