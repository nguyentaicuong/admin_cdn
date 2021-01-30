<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMuc;
use App\LoaiSanPham;
use Cloudder;


class LoaiSanPhamController extends Controller
{
    public function getDanhSach()
    {
    	$loaisanpham = LoaiSanPham::orderBy('id','DESC')->paginate(5);
        // $loaisanpham = LoaiSanPham::all();
        return view('quanly.loaisanpham.danhsach',['loaisanpham'=>$loaisanpham]);
    }


    public function getThem()
    {
        $danhmuc = DanhMuc::all();
    	return view('quanly.loaisanpham.them',['danhmuc'=>$danhmuc]);
    }


    public function postThem(Request $request)
    {
          $this->validate($request,
            [
                'ten'=>'required|unique:LoaiSanPham,tenloaisanpham|min:5|max:50',
                'DanhMuc'=>'required'
            ],
            [
                'ten.required'=>'bạn chưa nhập tên loại sản phẩm',
                'ten.unique'=>'tên loại sản phẩm đã tồn tại',
                'ten.min'=>'tên loại sản phẩm phải dài hơn 5 ký tự',
                'ten.max'=>'tên loại sản phẩm phải ngắn hơn 50 ký tự',
                'DanhMuc.required'=>'bạn chưa chọn danh mục'
            ]);

            $loaisanpham = new LoaiSanPham;
            $loaisanpham -> tenloaisanpham = $request->ten;

	        if($request->hasFile('hinh'))
	            {
                    $file = $request ->file('hinh'); //lưu hình vào trong biến file
                    $duoi = $file ->getClientOriginalExtension();
                    if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                    {
                        return redirect('quanly/loaisanpham/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                    }

                    $name = $file->getClientOriginalName();//lấy tên cái hình ra
                    Cloudder::upload($file, 'loaisanpham/'. $name);
      
                    $loaisanpham-> hinhanh = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/loaisanpham/'.$name.'.' .$duoi;
	              }

	          $loaisanpham -> iddanhmuc =$request->DanhMuc;
	          $loaisanpham ->save();
	          return redirect('quanly/loaisanpham/them')->with('thongbao','bạn đã thêm thành công');
		    }


    public function getSua($id)
    {
        $loaisanpham  = LoaiSanPham::find($id);
        $danhmuc =DanhMuc::all();
        return view('quanly.loaisanpham.sua',['loaisanpham'=>$loaisanpham,'danhmuc'=>$danhmuc]);
    }


    public function postSua(Request $request,$id)
    {
        $this->validate($request,
            [
                'ten'=>'required|min:5|max:50',
            ],
            [
                'ten.required'=>'bạn chưa nhập tên loại sản phẩm',
                'ten.min'=>'tên loại sản phẩm phải dài hơn 5 ký tự',
                'ten.max'=>'tên loại sản phẩm phải ngắn hơn 50 ký tự',
            ]);
        $loaisanpham =LoaiSanPham::find($id);
        $loaisanpham -> tenloaisanpham = $request->ten;
        $loaisanpham -> iddanhmuc = $request->DanhMuc;

        if($request->hasFile('hinh'))
              {
                    $file = $request ->file('hinh'); //lưu hình vào trong biến file
                    $duoi = $file ->getClientOriginalExtension();
                    if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                    {
                        return redirect('quanly/loaisanpham/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                    }

                    $name = $file->getClientOriginalName();//lấy tên cái hình ra
                    Cloudder::upload($file, 'loaisanpham/'. $name);
      
                    $loaisanpham-> hinhanh = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/loaisanpham/'.$name.'.' .$duoi;
              }

        $loaisanpham-> save();
        return redirect('quanly/loaisanpham/danhsach')->with('thongbao','bạn đã sửa thành công');
    }

    public function getXoa($id)
    {
        $loaisanpham = LoaiSanPham::find($id);
        $loaisanpham -> delete();
        return redirect('quanly/loaisanpham/danhsach')->with('thongbao','xóa thành công');
    }
}
