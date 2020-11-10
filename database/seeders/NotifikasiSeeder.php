<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifikasi = [
            'user_id' => 2,
            'konten'  => 'Surat sudah selesai diproses, silahkan membawa persyaratan yang diperlukan',
        ];

        DB::table('notifikasi')->insert($notifikasi);
    }
}
