<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\Notifikasi;
use App\Models\PermintaanSurat;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function beranda(Request $request)
    {
        $notifikasi      = Notifikasi::where('user_id', $request->user()['id'])->get();
        $permintaanSurat = PermintaanSurat::with('jenisSurat')->where(
            ['user_id' => $request->user()['id'], 'status_surat' => 'sedang diproses'])->get();
        $jenisSurat = JenisSurat::get();
        $persyaratan = $jenisSurat->mapWithKeys(function ($item) {
                return [$item['jenis_surat_id'] => explode(',',$item['persyaratan'])];
            });; 

        return view('warga.beranda')->with([
            'notifikasi' => $notifikasi,
            'permintaan' => $permintaanSurat,
            'surat'      => $jenisSurat,
            'persyaratan' => $persyaratan
        ]
        );
    }
}
