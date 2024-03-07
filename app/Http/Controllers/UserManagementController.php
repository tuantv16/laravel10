<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{

    public function create()
    {
        $roles = Role::all();
        
        return view('authorized.user_management', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->user_id)],
            'role_id' => 'required|exists:roles,id',
        ]);

        try {
            // Nếu có user_id, cập nhật người dùng hiện tại. Ngược lại, tạo mới
            $user = User::updateOrCreate(
                ['id' => $request->user_id], // Trường điều kiện
                [
                    'name' => $validatedData['name'],
                    'email' => $validatedData['email'],
                    'password' => Hash::make('123456'), // Sử dụng mật khẩu mặc định, hoặc tùy chỉnh logic tạo/đổi mật khẩu
                    'role_id' => $validatedData['role_id'],
                ]
            );

            // Bạn có thể thêm logic gửi email thông báo cho người dùng tại đây, nếu muốn

            return redirect()->back()->with('success', 'Thông tin người dùng đã được lưu thành công.');
        } catch (\Exception $e) {
            // Trả về thông báo lỗi nếu có vấn đề xảy ra trong quá trình lưu dữ liệu
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi lưu thông tin: ' . $e->getMessage());
        }
    }
}
