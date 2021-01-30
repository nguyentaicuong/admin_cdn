<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table ="comment";

    public function sanpham()
    {
    	return $this-> belongsTo('App\SanPham','idsanpham','id');  
    }

    public function user()
    {
    	return $this-> belongsTo('App\User','idusers','id');  
    }
}
