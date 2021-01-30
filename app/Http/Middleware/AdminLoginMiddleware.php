<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())//kiểm tra xem người dùng có đang đăng  nhập không
        {
            $user = Auth::user(); //lấy người dùng đang đăng nhập ra
            if($user->quyen ==1) //kiểm tra nếu quyền đăng nhập là admin
                return $next($request); //cho người dùng truy cập tiếp
            else
                return redirect('quanly/dangnhap');
        }
        
        else 
            return redirect('quanly/dangnhap');
    }
}
