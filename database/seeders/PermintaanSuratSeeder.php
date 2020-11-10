<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermintaanSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permintaanSurat = [
            'user_id'        => 2,
            'jenis_surat_id' => 1,
            'status_surat'   => 'sedang diproses',
        ];

        DB::table('permintaan_surat')->insert($permintaanSurat);

        $isianPermintaanSurat = [
            'permintaan_surat_id' => 1,
            'nama_isian'          => 'keperluan',
            'nilai_isian'         => 'melamar pekerjaan dungs',
        ];
        DB::table('isian_permintaan_surat')->insert($isianPermintaanSurat);
    }
}
