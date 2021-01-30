<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DanhMuc extends Model
{
    protected $table ="danhmuc";

    public function thuonghieu()
    {
    	return $this-> hasMany('App\ThuongHieu','iddanhmuc','id'); 
    }

    public function quangcao()
    {
    	return $this-> hasMany('App\QuangCao','iddanhmuc','id'); 
    }

    public function loaisanpham()
    {
    	return $this-> hasMany('App\LoaiSanPham','iddanhmuc','id');  
    }
}
