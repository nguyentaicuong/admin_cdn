<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMuc;
use Cloudder;

class DanhMucController extends Controller
{
    public function getDanhSach()
    {
        $danhmuc = DanhMuc::orderBy('id','DESC')->paginate(5);
        return view('quanly.danhmuc.danhsach',['danhmuc'=>$danhmuc]);
    }


    public function getThem()
    {

        return view('quanly.danhmuc.them');
    }


    public function postThem(Request $request)
    {

        $this->validate($request,
            [
             'tendm'=>'required|unique:danhmuc,tendanhmuc'
            ],
            [
            'tendm.required'=>'Bạn chưa nhâp tên danh mục',
            'tendm.unique'=>'Danh mục này đã tồn tại'
            ]);

        $danhmuc = new DanhMuc;
        $danhmuc-> tendanhmuc = $request->tendm;

        if($request->hasFile('hinh'))
                {
                    $file = $request ->file('hinh');
                    $duoi = $file ->getClientOriginalExtension();
                    if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                    {
                        return redirect('quanly/danhmuc/them')->with('thongbao','mời bạn chọn ảnh có đuôi png hoặc jpg');
                    }

                    $name = $file->getClientOriginalName();
                    Cloudder::upload($file, 'danhmuc/'. $name);
                    
                    //return $name;
                    //$file ->move("hinhanh/danhmuc",$name); 
                    $danhmuc-> hinh = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/danhmuc/'.$name.'.' .$duoi;

                }
                else
                {
                    $danhmuc-> hinh =" ";
                }

                $danhmuc->save();
                return redirect('quanly/danhmuc/danhsach')->with('thongbao','Bạn đã thêm thành công một danh mục');
    }

    public function getSua($id)
    {
        $danhmuc  = DanhMuc::find($id);
        return view('quanly.danhmuc.sua',['danhmuc'=>$danhmuc]);
    }

    public function postSua(Request $request, $id)
    {
        $danhmuc  = DanhMuc::find($id);
        $this->validate($request,[
            'tendm'=>'required'
            ],
            [
            'tendm.required'=>'Bạn chưa nhâp tên loại món',
            ]);
                
            $danhmuc-> tendanhmuc = $request->tendm;

            

            if($request->hasFile('hinh'))
              {
                    $file = $request ->file('hinh'); //lưu hình vào trong biến file
                    $duoi = $file ->getClientOriginalExtension();
                    if($duoi !='jpg' && $duoi !='png' && $duoi !='PNG')
                    {
                        return redirect('quanly/danhmuc/them')->with('thongbao','mời bạn chọn ảnh đuôi png hoặc jpg');
                    }

                    $name = $file->getClientOriginalName();//lấy tên cái hình ra
                    Cloudder::upload($file, 'danhmuc/'. $name);
                    // unlink("hinhanh/danhmuc/".$danhmuc-> hinh); //xóa hình cũ
                    $danhmuc-> hinh = 'https://res.cloudinary.com/banhang/image/upload/v1593865252/danhmuc/'.$name.'.' .$duoi;
              }
          
          $danhmuc->save();
          return redirect('quanly/danhmuc/danhsach/')->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $danhmuc = DanhMuc::find($id);
        $danhmuc -> delete();
        return redirect('quanly/danhmuc/danhsach')->with('thongbao','xóa thành công');
    }
}
