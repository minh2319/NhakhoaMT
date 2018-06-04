<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    //
            protected $table='tintuc';
            public $timestamps = false;
            	protected $primaryKey = 'MaTinTuc';

public function loaitin()
	{
		return $this->belongsTo('App\loaitin','MaLoaiTin','MaLoaiTin');
	}
	public function binhluan()
	{
		return $this->hasMany('App\binhluan','MaTinTuc','MaTinTuc');
	}
}
