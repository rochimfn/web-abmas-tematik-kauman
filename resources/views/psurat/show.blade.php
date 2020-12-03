@section('js')

<script type="text/javascript">
    function readURL() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).prev().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function() {
        $(".uploads").change(readURL)
        $("#f").submit(function() {
            return false
        })
    })
</script>
@stop

@extends('layouts.admin')

@section('content')
<div class="container" style="margin-top: 50px; margin-left: 200px;">
    <div><h2 class="mb-4">Detail Surat</h2></div>
    <div class="header-body">
        <div class="row">
            <div class="col-xl-10 col-lg-6">
                <div class="card card-stats mb-3">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col">
                                <!-- <h5 class="card-stats-title">Jenis Surat</h5> -->
                                <div class="card-stats-item">
                                    <div>Nama Pemohon : {{$psurats->user->biodata->nama_lengkap}}</div><hr>
                                </div>
                            </div>
                            <div class="col">
                                <!-- <h5 class="card-stats-title">Jenis Surat</h5> -->
                                <div class="card-stats-item">
                                    <div>NIK Pemohon : {{$psurats->user->biodata->no_nik}}</div><hr>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <!-- <h5 class="card-stats-title">Jenis Surat</h5> -->
                                <div class="card-stats-item">
                                    <div>Jenis Surat : {{$psurats->jenisSurat->nama}}</div><hr>
                                </div>
                            </div>
                            <div class="col">
                                <!-- <h5 class="card-stats-title">Jenis Surat</h5> -->
                                <div class="card-stats-item">
                                    <div>Persyaratan : {{$psurats->jenisSurat->persyaratan}}</div><hr>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <!-- <h5 class="card-stats-title">Isi Pemberitahuan</h5> -->
                                <div class="card-stats-item">
                                    <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="tabel">
                                        <thead>
                                        <tr class="table-primary">
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama Isian</th>
                                            <th style="text-align: center;">Isian</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($isianPermintaanSurats as $object)
                                        <tr>
                                            <td class="Idr">{{$object['isian_permintaan_surat_id']}}</td>
                                            <td class="NamaUser">{{$object['nama_isian']}}</td>
                                            <td class="Isian">{{$object['nilai_isian']}}</td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                        
                    </div>
                </div>
            <div class="card">
                <div class="card-header" color:rgb(123, 104, 238)>{{ __('Edit Status Surat') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{route('psurat.update',  $psurats['permintaan_surat_id'])}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('status_surat') ? ' has-error' : '' }}">
                                <select class="form-control" name="status_surat" required>
                                    <option value="sedang diproses">sedang diproses</option>
                                    <option value="diajukan">diajukan</option>
                                    <option value="ditolak">ditolak</option>
                                    <option value="selesai">selesai</option>
                                </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col" align='center'>
                                        <button type="submit" class="btn btn-primary" id="submit">Update</button>
                                        <button  href="{{route('psurat.index')}}" class="btn btn-secondary">Kembali</button>

                                    </div>
                                </div>
                        </form>

                    </div>
            </div>
        </div>
    </div>


</div>
@endsection