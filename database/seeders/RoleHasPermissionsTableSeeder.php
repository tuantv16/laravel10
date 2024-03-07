<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Add permission to Admin
         $adminRoleId = DB::table('roles')->where('name', 'Admin')->first()->id;
         $permissions = DB::table('permissions')->get();
         foreach ($permissions as $perm) {
             DB::table('role_has_permissions')->insert([
                 'role_id' => $adminRoleId,
                 'permission_id' => $perm->id,
             ]);
         }
 
         // Add limited permissions to Editor
         $editorRoleId = DB::table('roles')->where('name', 'Editor')->first()->id;
         $editPermissionId = DB::table('permissions')->where('name', 'edit-article')->first()->id;
         $viewPermissionId = DB::table('permissions')->where('name', 'view-article')->first()->id;
         DB::table('role_has_permissions')->insert([
             ['role_id' => $editorRoleId, 'permission_id' => $editPermissionId],
             ['role_id' => $editorRoleId, 'permission_id' => $viewPermissionId],
         ]);
    }
}
