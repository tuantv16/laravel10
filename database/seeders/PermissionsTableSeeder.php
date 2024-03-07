<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['name' => 'create_post', 'description' => 'Create a post'],
            ['name' => 'edit_post', 'description' => 'Edit a post'],
            ['name' => 'delete_post', 'description' => 'Delete a post'],
        ]);
    }
}
