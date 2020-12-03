<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use \PhpOffice\PhpWord\Exception\CopyFileException;

use App\Models\IsianPermintaanSurat;
use App\Models\JenisSurat;
use App\Models\PermintaanSurat;

class SuratController extends Controller
{
    public function ajukanSuratForm($id)
    {
        $jenisSurat = JenisSurat::with('isianSurat')->findOrFail($id);
        return view('warga.pengajuan')->with(['jenisSurat' => $jenisSurat]);
    }

    public function ajukanSurat(Request $request, $id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        $permintaanSurat = new PermintaanSurat(['user_id' => $request->user()->id]);

        $data = $request->except('_token');
        $isianPermintaanSurat = [];
        foreach ($data as $key => $value) {
            array_push($isianPermintaanSurat, new IsianPermintaanSurat(
                ['nama_isian' => $key, 'nilai_isian' => $value]
            ));
        }
        if ($isianPermintaanSurat) {
            $jenisSurat->isianSurat()->save($permintaanSurat)->isianPermintaanSurat()->saveMany($isianPermintaanSurat);
        } else {
            $jenisSurat->isianSurat()->save($permintaanSurat);
        }

        return redirect()->route('beranda.warga')->with('success', ['Berhasil diajukan, surat akan segera diproses.']);
    }
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

        $templateProcessor->saveAs(storage_path(join(DIRECTORY_SEPARATOR, ['app', 'surat', 'output.docx'])));
        $permintaanSurat['status_surat'] = 'sedang diproses';
        $permintaanSurat->save();
        return Storage::download(
            'surat/output.docx',
            date('Y-m-d') . '_' . $jenisSurat['nama'] . '_' . $permintaanSurat['user']['biodata']['nama_lengkap'] . '.docx'
        );
    }
    public function diajukan()
    {
        $psurats = PermintaanSurat::paginate(10);
        $jenisSurat = JenisSurat::paginate(10);
        $isianPermintaanSurat = IsianPermintaanSUrat::paginate(10);
        return view('psurat.diajukan', compact('psurats'));
    }
    public function diproses()
    {
        $psurats = PermintaanSurat::paginate(10);
        $jenisSurat = JenisSurat::paginate(10);
        $isianPermintaanSurat = IsianPermintaanSUrat::paginate(10);
        return view('psurat.diproses', compact('psurats'));
    }
    public function ditolak()
    {
        $psurats = PermintaanSurat::paginate(10);
        $jenisSurat = JenisSurat::paginate(10);
        $isianPermintaanSurat = IsianPermintaanSUrat::paginate(10);
        return view('psurat.ditolak', compact('psurats'));
    }
    public function selesai()
    {
        $psurats = PermintaanSurat::paginate(10);
        $jenisSurat = JenisSurat::paginate(10);
        $isianPermintaanSurat = IsianPermintaanSUrat::paginate(10);
        return view('psurat.selesai', compact('psurats'));
    }
    public function index()
    {
        $psurats = PermintaanSurat::paginate(10);
        $jenisSurat = JenisSurat::paginate(10);
        $isianPermintaanSurat = IsianPermintaanSUrat::paginate(10);
        return view('psurat.index', compact('psurats'));
    }
    public function show($id)
    {
        $psurats = PermintaanSurat::find($id);
        $isianPermintaanSurats = IsianPermintaanSurat::where('permintaan_surat_id', $id)->get();
        return view('psurat.show', compact('isianPermintaanSurats', 'id', 'psurats'));
    }
    public function destroy($id)
    {
        $isianSurats = IsianPermintaanSurat::findOrFail($id);
        $isianSurats->delete();
        $psurats = PermintaanSurat::findOrFail($id);
        $psurats->delete();
        return redirect()->route('psurat.index')->with('success', 'Pemberitahuan berhasil dihapus');
    }
    public function update(Request $request, $id)
    {
        $psurats = PermintaanSurat::findOrFail($id);
        $this->validate(request(), [
            'status_surat' => 'required',
        ]);
        $psurats->status_surat = $request->get('status_surat');
        $psurats->save();
        return redirect()->route('psurat.index')->with('success', 'Surat berhasil diupdate');
    }
    public function informasi($id)
    {
        $psurats = PermintaanSurat::find($id);
        $isianPermintaanSurats = IsianPermintaanSurat::where('permintaan_surat_id', $id)->get();
        return view('psurat.informasi', compact('isianPermintaanSurats', 'id', 'psurats'));
    }
    public function prosesSurat(Request $request, $id)
    {
        $psurats = PermintaanSurat::findOrFail($id);
        $this->validate(request(), [
            'status_surat' => 'required',
        ]);
        $psurats->status_surat = $request->get('status_surat');
        $psurats->save();
        return redirect()->route('psurat.index')->with('success', 'Surat berhasil diupdate');
    }
    public function tolakSurat(Request $request, $id)
    {
        $psurats = PermintaanSurat::findOrFail($id);
        $this->validate(request(), [
            'status_surat' => 'required',
        ]);
        $psurats->status_surat = $request->get('status_surat');
        $psurats->save();
        return redirect()->route('psurat.index')->with('success', 'Surat telah ditolak');
    }
    public function selesaiSurat(Request $request, $id)
    {
        $psurats = PermintaanSurat::findOrFail($id);
        $this->validate(request(), [
            'status_surat' => 'required',
        ]);
        $psurats->status_surat = $request->get('status_surat');
        $psurats->save();
        return redirect()->route('psurat.index')->with('success', 'Surat telah selesai');
    }
}
