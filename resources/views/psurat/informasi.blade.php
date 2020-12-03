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
                                    <div>Subjeck Surat : {{$psurats->isianPermintaanSurat->nama_isian}}</div><hr>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <!-- <h5 class="card-stats-title">Isi Pemberitahuan</h5> -->
                                <div class="card-stats-item">
                                    <div>Persyaratan:</div>
                                    <div>{{$psurats->jenisSurat->persyaratan}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <!-- <h5 class="card-stats-title">Isi Pemberitahuan</h5> -->
                                <div class="card-stats-item">
                                    <div>Isi Surat:</div>
                                    <div>{{$psurats->isianPermintaanSurat->nilai_isian}}</div>
                                </div>
                            </div>
                        </div>
                        <form method="POST" align='center' action="{{route('psurat.destroy', $psurats['permintaan_surat_id'])}}" >
                        {{ csrf_field() }}
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>


</div>
@endsection