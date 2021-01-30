<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\ThuongHieu;

class AjaxController extends Controller
{
    public function getThuongHieu($idloaisanpham){
    	$thuonghieu = ThuongHieu::where('idloaisanpham', $idloaisanpham)->get();
    	foreach ($thuonghieu as $th) {
    		echo "<option value='".$th->id."'>".$th->tenthuonghieu."</option>";
    	}
    }
}
