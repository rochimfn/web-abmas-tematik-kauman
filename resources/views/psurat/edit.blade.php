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

<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" color:rgb(123, 104, 238)>{{ __('Edit Status') }}</div>
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
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('psurat.update',  $psurats['permintaan_surat_id'])}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('status_surat') ? ' has-error' : '' }}">
                                <select class="form-control" name="status_surat" required>
                                    <option value="sedang diproses">sedang diproses</option>
                                    <option value="diajukan">diajukan</option>
                                </select>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-5 offset-md-4" align='center'>
                                        <button type="submit" class="btn btn-primary" id="submit">Update</button>
                                        <a href="{{route('post.index')}}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection