<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thuoc extends Model
{
    //
	protected $table='thuoc';
	public $timestamps = false;
	protected $primaryKey = 'MaThuoc';

public function chitietthuocsudung()
	{
		return $this->hasMany('App\dichvu','MaThuoc','MaThuoc');
	}
}
