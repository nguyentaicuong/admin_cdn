<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table ="loaisanpham";

    public function danhmuc()
    {
    	return $this-> belongsTo('App\DanhMuc','iddanhmuc','id');  
    }

    public function sanpham()
    {
    	return $this-> hasMany('App\SanPham','idloaisanpham','id');  
    }
}
