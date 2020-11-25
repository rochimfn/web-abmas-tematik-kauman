@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="card-body">
          <h4>
            {{$jenisSurat['nama']}}
          </h4>
          <p><em>Silahkan mengisi isian berikut untuk mengajukan {{$jenisSurat['nama']}}</em></p>
          <hr>
          <form method="POST">
            @csrf
            @foreach ($jenisSurat['isianSurat'] as $isian)
            <div class="form-group row">
              <label for="isian{{$isian['nama_isian']}}"
                class="col-md-2 col-form-label text-md-right font-weight-bold">{{ucfirst($isian['nama_isian'])}}
                :</label>
              <div class="col-md-10">
                <input type="text" name="{{$isian['nama_isian']}}" class="form-control"
                  id="isian{{$isian['nama_isian']}}" placeholder="{{$isian['contoh_isian']}}" required>
              </div>
            </div>
            @endforeach
            <div class="mt-3">
              <h5>
                Berkas yang perlu dipersiapkan
              </h5>
              <ol id="persyaratan">
                @forelse (explode(',', $jenisSurat['persyaratan']) as $item)
                <li>{{$item}}</li>
                @empty
                <li>
                  Tidak ada
                </li>
                @endforelse
              </ol>
              <button type="submit" class="btn btn-success float-right">Buat
                pengajuan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
</script>
@endsection