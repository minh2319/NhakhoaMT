<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lichkham extends Model
{
    //
	protected $table='lichkham';
	public $timestamps = false;
	protected $primaryKey = 'MaLichKham';

	public function bacsi()
	{
		return $this->belongsTo('App\bacsi','MaBacSi','MaBacSi');
	}

}
