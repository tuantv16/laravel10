<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Admin', 'description' => 'Administrator of the system'],
            ['name' => 'Editor', 'description' => 'Can edit and update posts'],
            ['name' => 'Viewer', 'description' => 'Can view content'],
        ]);
    }
}
