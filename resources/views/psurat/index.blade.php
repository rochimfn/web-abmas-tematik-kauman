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
          <h4 class="card-title">Semua Surat</h4>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr class="table-primary">
                    <th width="50px" style="text-align: center;">No</th>
                    <th width="200px" style="text-align: center;">User</th>
                    <th width="200px" style="text-align: center;">Jenis Surat</th>
                    <th width="200px" style="text-align: center;">Isian Surat</th>
                    <th width="300px" style="text-align: center;">Status Surat</th>
                    <th width="150px" style="text-align: center;">Dibuat</th>
                    <th width="150px" style="text-align: center;">Terakhir direview</th>
                    <th colspan="3" style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($psurats as $permintaan_surat)
                  <tr>
                    <td class="Idr">{{$permintaan_surat['permintaan_surat_id']}}</td>
                    <td class="User">{{$permintaan_surat->user->biodata->nama_lengkap}}</td>
                    <td class="Jenis">{{$permintaan_surat->jenisSurat->nama}}</td>
                    <td class="Jenis">{{$permintaan_surat->isianPermintaanSurat->nama_isian}}</td>
                    <td class="Status">{{$permintaan_surat['status_surat']}}</td>
                    <td>{{date('d/m/y h:m', strtotime($permintaan_surat['created_at']))}}</td>
                    <td>{{date('d/m/y h:m', strtotime($permintaan_surat['updated_at']))}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
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