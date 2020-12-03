@extends('layouts.admin')

@section('content')
<div class="row" style="margin-top: 50px; margin-left: 200px;">
  <div style="margin-left: 15px;"><h2>Permintaan Surat</h2></div>
</div>
  <div class="col-lg-12">
    @if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
    @endif
  </div>
</div>
<div class="row" style="margin-top: 20px; margin-left: 200px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
       <div class="card-body">
          <h4 class="card-title">Surat di Proses</h4>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr class="table-primary">
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Pemohon</th>
                    <th style="text-align: center;">Jenis Surat</th>
                    <th style="text-align: center;">Dibuat</th>
                    <th style="text-align: center;">Terakhir direview</th>
                    <th colspan="5" style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($psurats as $permintaan_surat)
                      @if($permintaan_surat->status_surat == 'sedang diproses')
                  <tr>
                    <td class="Idr">{{$permintaan_surat['permintaan_surat_id']}}</td>
                    <td class="User">{{$permintaan_surat->user->biodata->nama_lengkap}}</td>
                    <td class="Jenis">{{$permintaan_surat->jenisSurat->nama}}</td>
                    <td>{{date('d/m/y h:m', strtotime($permintaan_surat['created_at']))}}</td>
                    <td>{{date('d/m/y h:m', strtotime($permintaan_surat['updated_at']))}}</td>
                    <td align='center'><a href="{{route('psurat.informasi', $permintaan_surat['permintaan_surat_id'])}}" class="btn btn-info" >Informasi</a></td>
                    <td align='center'><a href="{{route('cetak.surat', $permintaan_surat['permintaan_surat_id'])}}" class="btn btn-info" >Cetak</a>
                    </td>
                    <td align='center'>    <form method="POST" action="{{route('psurat.prosesSurat', $permintaan_surat['permintaan_surat_id'])}}" >
                        {{ csrf_field() }}
                          <input name="status_surat" type="hidden" value="selesai">
                          <button class="btn btn-success" type="submit" onclick="return confirm('Anda yakin menyelesaikan proses surat ini?')">Selesai</i></button>
                        </form>
                    </td>
                    <td align='center'>    <form method="POST" action="{{route('psurat.tolakSurat', $permintaan_surat['permintaan_surat_id'])}}" >
                        {{ csrf_field() }}
                          <input name="status_surat" type="hidden" value="ditolak">
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Anda yakin menolak surat ini?')">Tolak</i></button>
                        </form>
                    </td>
                    <td align='center'>    <form method="POST" action="{{route('psurat.destroy', $permintaan_surat['permintaan_surat_id'])}}" >
                        {{ csrf_field() }}
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</i></button>
                        </form>
                    </td>
                      @endif
                    @endforeach
                </tbody>
              </table>
            </div>
           {{$psurats->links()}}
      </div>
    </div>
  </div>
</div>

@endsection