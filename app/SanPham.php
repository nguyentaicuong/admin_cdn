<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table ="sanpham";

    public function thuonghieu()
    {
    	return $this-> belongsTo('App\ThuongHieu','idthuonghieu','id');  
    }

    public function loaisanpham()
    {
    	return $this-> belongsTo('App\LoaiSanPham','idloaisanpham','id'); 
    }

    public function comment()
    {
    	return $this-> hasMany('App\Comment','idsanpham','id'); 
    }
}
