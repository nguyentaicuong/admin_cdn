<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function getDanhSach()
    {
    	$users = User::orderBy('id','DESC')->paginate(8);
        return view('quanly.users.danhsach',['users'=>$users]);
    }

    public function getThem()
    {
    	return view('quanly.users.them');
    }


    public function postThem(Request $request)
    {
        $this ->validate($request,[
            'name'=> 'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:32',
            'passwordAgain'=>'required|same:password'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'bạn chưa nhập đúng định dạng email',
            'email.unique'=>'email đã tồn tại',
            'password.required'=>'Bnạ chưa nhập mật khẩu',
            'password.min' =>'mật khẩu phải có ít nhất 3 ký tự',
            'password.max'=>'mật khẩu tối đa 32 ký tự',
            'passwordAgain.required'=>'Bnạ chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'
        ]);
        $users = new User;
        $users -> full_name =$request-> name;
        $users -> email=$request-> email;
        $users -> password = bcrypt($request-> password);
        $users -> phone=$request-> sdt;
        $users -> address=$request-> diachi;
        $users -> quyen = $request-> quyen;
        $users -> save();
        return redirect('quanly/users/them')->with('thongbao','Thêm người dùng thành công');
    }


	public function getSua($id)
    {
        $users = User::find($id);
        return view('quanly.users.sua',['users'=>$users]);
    }


    public function postSua(Request $request,$id)
    {
        $this ->validate($request,[
            'name'=> 'required|min:3'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự'
        ]);
        $users =  User::find($id);
        $users -> full_name  = $request-> name;
        $users -> quyen = $request-> quyen;
        $users -> phone  = $request-> sdt;
        $users -> address = $request-> diachi;
        if($request->changePassword =="on") //nếu người dùng check vào ô checkbox
            {
                $this ->validate($request,
                    [
                        'password'=>'required|min:6|max:32',
                        'passwordAgain'=>'required|same:password'
                    ],
                    [
                        'password.required'=>'Bạn chưa nhập mật khẩu',
                        'password.min' =>'mật khẩu phải có ít nhất 3 ký tự',
                        'password.max'=>'mật khẩu tối đa 32 ký tự',
                        'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                        'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'
                    ]);
                $user -> password = bcrypt($request-> password);
            }
            
        $users -> save();
        return redirect('quanly/users/danhsach')->with('thongbao','Sửa thành công');
    }


    public function getXoa($id)
    {
        $users = User::find($id);
        $users -> delete();
        return redirect('quanly/users/danhsach')->with('thongbao','xóa thành công');
    }


    public function getDangnhapAdmin()
    {
      return view('quanly.login');
    }


    public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:5|max:25'
            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 5 ký tự',
                'password.min'=>'Mật khẩu tối đa 25 ký tự'
            ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('quanly/sanpham/danhsach');
        }
        else
        {
            return redirect('quanly/dangnhap')->with('thongbao','Sai email hoặc mật khẩu,bạn vui lòng đăng nhập lại');
        }
    }

    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('quanly/dangnhap');
    }
}
