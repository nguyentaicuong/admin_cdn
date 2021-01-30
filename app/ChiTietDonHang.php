<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    protected $table ="chitietdonhang";

    public function donhang()
    {
    	return $this-> belongsTo('App\DonHang','madonhang','id');  
    }
}
