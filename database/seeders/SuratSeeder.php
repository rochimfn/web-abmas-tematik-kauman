<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisSurat = [
            'nama'               => 'Surat Contoh',
            'persyaratan'        => 'KTP, KK, Surat pengatar RT, Pasangan hidup',
            'nama_template'      => 'example.docx',
            'biodata_diperlukan' => 'nama_lengkap;tempat_lahir;tanggal_lahir;jenis_kelamin',
            'created_at'         => now(),
            'updated_at'         => now()
        ];

        DB::table('jenis_surat')->insert($jenisSurat);

        $isianSurat = [
            [
                'jenis_surat_id' => 1,
                'nama_isian'     => 'keperluan',
                'contoh_isian'   => 'Melamar Pekerjaan',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        DB::table('isian_surat')->insert($isianSurat);
    }
}
