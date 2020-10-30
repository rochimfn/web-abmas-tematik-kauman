<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nik' => '1050241708900001',
                'name' => 'admin wikipedia',
                'email' => 'admin@localhost',
                'password' => '$2y$10$S7yMc/9M1J6mrotdlzGkIe8o3UGCa3OZDILOZbUoXp.VrAFBHmtqm',
                'email_verified_at' => now(),
                'is_admin' => 1
            ]
        ];
        DB::table('users')->insert($user);
    }
}
