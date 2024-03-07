<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        // Đảm bảo người dùng đã đăng nhập
        //comment tạm
        //if (!Auth::check()) return redirect('login');

        $user = Auth::user();
        
        //comment tạm
        //$userPermissions = $user->role->permissions->pluck('id')->toArray(); // Lấy tất cả id của permissions của user
        $userPermissions = [29]; // = 1 thì có quyền truy cập vào được.

        foreach ($permissions as $permission) {
            // Kiểm tra nếu người dùng có quyền cần thiết
            if (in_array($permission, $userPermissions)) {
                return $next($request); // Người dùng có quyền, tiếp tục request
            }
        }

        // Nếu không có quyền, redirect về trang home
        return redirect('ban-khong-co-quyen-truy-cap-vao-man-hinh-nay');
        //return redirect('home');
    }
}
