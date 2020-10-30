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
            [
                'nama' => 'Surat Contoh',
                'persyaratan' => 'KTP, KK, Surat pengatar RT, Pasangan hidup',
                'nama_template' => 'example.docx'
            ]
        ];

        $jenisSuratId = DB::table('jenis_surat')->insertGetId($jenisSurat);

        $isianSurat = [
            []
        ];
    }
}
