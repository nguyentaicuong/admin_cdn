<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table ="donhang";
    const STATUS_DONE =1;
    const STATUS_DEFAULT=0;

    public function chitietdonhang()
    {
    	return $this-> hasMany('App\ChiTietDonHang','madonhang','id');  
    }
}
