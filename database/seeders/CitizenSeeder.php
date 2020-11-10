<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kk = [
            [
                'no_kk'  => '7307050302120002',
                'alamat' => 'Di ...',
            ],
        ];
        DB::table('kartu_keluarga')->insert($kk);

        $citizenBiodata = [
            [
                'no_nik'              => '1050241708900001',
                'nama_lengkap'        => 'Contoh',
                'tempat_lahir'        => 'Wikipedia',
                'tanggal_lahir'       => now(),
                'jenis_kelamin'       => 'L',
                'sdhk'                => 'Anak',
                'agama_id'            => 1,
                'pendidikan_terakhir' => 'S1 Per',
                'pekerjaan'           => 'Belum',
                'nama_ibu'            => 'Bu Contoh',
                'no_kk'               => '7307050302120002',
                'created_at'          => now(),
                'updated_at'          => now(),
            ],
        ];
        DB::table('biodata_penduduk')->insert($citizenBiodata);

        $citizenUser = [
            [
                'username'          => '1050241708900001',
                'email'             => 'example@localhost',
                'email_verified_at' => now(),
                'password'          => Hash::make('{password}'),
                'is_admin'          => 0,
                'created_at'        => now(),
                'updated_at'        => now(),
                'no_nik'            => '1050241708900001',
            ],
        ];

        DB::table('users')->insert($citizenUser);
    }
}
