<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'username' => 'admin',
                'email' => 'admin@localhost',
                'password' => Hash::make('{password_1}'),
                'email_verified_at' => now(),
                'is_admin' => 1
            ]
        ];
        DB::table('users')->insert($user);
    }
}
