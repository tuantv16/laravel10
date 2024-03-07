<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    // Mối quan hệ nhiều-nhiều với Role
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
    }

    // Mối quan hệ nhiều-nhiều với User thông qua bảng model_has_permissions
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'model_has_permissions', 'permission_id', 'model_id');
    // }
}
