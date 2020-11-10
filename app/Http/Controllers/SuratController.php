<?php

namespace App\Http\Controllers;

use App\Models\PermintaanSurat;
use Illuminate\Support\Facades\Storage;
use \PhpOffice\PhpWord\Exception\CopyFileException;

class SuratController extends Controller
{
    public function cetakSurat($id)
    {
        $permintaanSurat = PermintaanSurat::with(
            'user.biodata.agama',
            'user.biodata.kartuKeluarga',
            'isianPermintaanSurat',
            'jenisSurat.isianSurat'
        )->findOrFail($id);

        $jenisSurat = $permintaanSurat['jenisSurat'];

        try {
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(
                storage_path('template/' . $jenisSurat['nama_template'])
            );
        } catch (CopyFileException $e) {
            return redirect()->back()->withErrors('Template tidak ditemukan!');
        }

        if (!empty($jenisSurat['biodata_diperlukan'])) {
            $biodataDiperlukan = explode(';', $jenisSurat['biodata_diperlukan']);
            $biodata           = $permintaanSurat['user']['biodata'];

            foreach ($biodataDiperlukan as $item) {
                if ($biodata[$item]) {
                    $templateProcessor->setValue($item, $biodata[$item]);
                } else if ($item == 'alamat' && $biodata['kartuKeluarga']['alamat']) {
                    $templateProcessor->setValue($item, $biodata['kartuKeluarga']['alamat']);
                } else if ($item == 'agama' && $biodata['agama']['agama_nama']) {
                    $templateProcessor->setValue($item, $biodata['agama']['agama_nama']);
                }
            }
        }

        $isianSurat = $permintaanSurat['jenisSurat']['isianSurat'];
        if (!empty($isianSurat)) {

            $isianPermintaanSurat = $permintaanSurat['isianPermintaanSurat']->mapWithKeys(function ($item) {
                return [$item['nama_isian'] => $item['nilai_isian']];
            });

            foreach ($isianSurat as $item) {
                if ($isianPermintaanSurat[$item['nama_isian']]) {
                    $templateProcessor->setValue($item['nama_isian'], $isianPermintaanSurat[$item['nama_isian']]);
                }
            }
        }

        $templateProcessor->saveAs(storage_path('app/surat/output.docx'));
        return Storage::download(
            'surat/output.docx',
            date('Y-m-d') . '_' . $jenisSurat['nama'] . '_' . $permintaanSurat['user']['biodata']['nama_lengkap'] . '.docx'
        );

    }
}
