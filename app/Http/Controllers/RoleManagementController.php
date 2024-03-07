<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleManagementController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('authorized.role_management', compact('roles', 'permissions'));
    }

    public function save(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->permissions as $roleId => $permissionIds) {
                $role = Role::findOrFail($roleId);
                $role->permissions()->sync($permissionIds);
            }
            DB::commit();
            return redirect()->route('roleManagement')->with('success', 'Phân quyền đã được cập nhật thành công!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('roleManagement')->with('error', 'Có lỗi xảy ra khi cập nhật phân quyền.');
        }
    }
}
