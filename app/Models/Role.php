<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    // Mối quan hệ nhiều-nhiều với User
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id');
    // }

    // Mối quan hệ nhiều-nhiều với Permission
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }

    // Phương thức để gán quyền cho vai trò
    // public function givePermissionTo(Permission $permission)
    // {
    //     $this->permissions()->save($permission);
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
