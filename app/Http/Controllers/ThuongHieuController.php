<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThuongHieu;
use App\DanhMuc;
use Cloudder;

class ThuongHieuController extends Controller
{
    public function getDanhSach()
    {
    	$thuonghieu = ThuongHieu::orderBy('id','DESC')->paginate(6);
        return view('quanly.thuonghieu.danhsach',['thuonghieu'=>$thuonghieu]);
    }

    public function getThem()
    {
        $danhmuc = DanhMuc::all();
    	return view('quanly.thuonghieu.them',['danhmuc'=>$danhmuc]);
    }


    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'ten'=>'required|unique:ThuongHieu,tenthuonghieu|min:3|max:50',
                'DanhMuc'=>'required'
            ],
            [
                'ten.required'=>'bạn chưa nhập tên thương hiệu',
                'ten.unique'=>'tên thương hiệu đã tồn tại',
                'ten.min'=>'tên thương hiệu phải dài hơn 3 ký tự',
                'ten.max'=>'tên thương hiệu phải ngắn hơn 50 ký tự',
                'DanhMuc.required'=>'bạn chưa chọn danh mục'
            ]);

            $thuonghieu = new ThuongHieu;
            $thuonghieu -> tenthuonghieu = $request->ten;

	        if($request->hasFile('hinh'))
	            {
                    $file = $request ->file('hinh'); //lưu hình vào trong biến file
                    $duoi = $file ->getClientOriginalExtension();
                    if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                    {
                        return redirect('quanly/thuonghieu/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                    }

                    $name = $file->getClientOriginalName();//lấy tên cái hình ra
                    Cloudder::upload($file, 'thuonghieu/'. $name);
      
                    $thuonghieu-> hinhthuonghieu = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/thuonghieu/'.$name.'.' .$duoi;
	              }

	        if($request->hasFile('hinh2'))
	            {
                    $file = $request ->file('hinh2'); //lưu hình vào trong biến file
                    $duoi = $file ->getClientOriginalExtension();
                    if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                    {
                        return redirect('quanly/thuonghieu/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                    }

                    $name = $file->getClientOriginalName();//lấy tên cái hình ra
                    Cloudder::upload($file, 'thuonghieu/hinhbia/'. $name);
      
                    $thuonghieu-> hinhbia = 'https://res.cloudinary.com/banhang/image/upload/v1594008331/thuonghieu/hinhbia/'.$name.'.' .$duoi;
	              }

	          $thuonghieu -> iddanhmuc =$request->DanhMuc;
	          $thuonghieu ->save();
	          return redirect('quanly/thuonghieu/them')->with('thongbao','bạn đã thêm thành công');
	}

	public function getSua($id)
    {
        $thuonghieu  = ThuongHieu::find($id);
        $danhmuc =DanhMuc::all();
        return view('quanly.thuonghieu.sua',['thuonghieu'=>$thuonghieu,'danhmuc'=>$danhmuc]);
    }


    public function postSua(Request $request,$id)
    {
        $this->validate($request,
            [
                'ten'=>'required|min:3|max:50',
            ],
            [
                'ten.required'=>'bạn chưa nhập tên thương hiệu',
                'ten.min'=>'tên thương hiệu phải dài hơn 3 ký tự',
                'ten.max'=>'tên thương hiệu phải ngắn hơn 50 ký tự',
            ]);

        $thuonghieu =ThuongHieu::find($id);
        $thuonghieu -> tenthuonghieu = $request->ten;

        if($request->hasFile('hinh'))
          	{
                $file = $request ->file('hinh'); //lưu hình vào trong biến file
                $duoi = $file ->getClientOriginalExtension();
                if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                {
                    return redirect('quanly/thuonghieu/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                }

                $name = $file->getClientOriginalName();//lấy tên cái hình ra
                Cloudder::upload($file, 'thuonghieu/'. $name);
  
                $thuonghieu-> hinhthuonghieu = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/thuonghieu/'.$name.'.' .$duoi;
          	}
        if($request->hasFile('hinh2'))
            {
                $file = $request ->file('hinh2'); //lưu hình vào trong biến file
                $duoi = $file ->getClientOriginalExtension();
                if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                {
                    return redirect('quanly/thuonghieu/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                }

                $name = $file->getClientOriginalName();//lấy tên cái hình ra
                Cloudder::upload($file, 'thuonghieu/hinhbia/'. $name);
  
                $thuonghieu-> hinhbia = 'https://res.cloudinary.com/banhang/image/upload/v1594008331/thuonghieu/hinhbia/'.$name.'.' .$duoi;
            }
	    $thuonghieu -> iddanhmuc = $request->DanhMuc;

        $thuonghieu-> save();
        return redirect('quanly/thuonghieu/danhsach')->with('thongbao','bạn đã sửa thành công');
    }


	public function getXoa($id)
    {
        $thuonghieu = ThuongHieu::find($id);
        $thuonghieu -> delete();
        return redirect('quanly/thuonghieu/danhsach')->with('thongbao','xóa thành công');
    }

}
