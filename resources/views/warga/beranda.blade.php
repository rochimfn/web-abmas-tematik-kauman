@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h4>
                        Pemberitahuan
                    </h4>
                    @forelse($notifikasi as $item)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{$item['konten']}}
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    @empty
                    <p>
                        Tidak ada notifkasi.
                    </p>
                    @endforelse
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4>
                        Pengajuan yang Sedang Diproses
                    </h4>
                    <ul class="list-group">
                        @forelse($permintaan as $item)
                        <li class="list-group-item">
                            {{$item['jenisSurat']['nama']}}
                        </li>
                        @empty
                        <li class="list-group-item">
                            Tidak ada.
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h4>
                        Buat Pengajuan Surat
                    </h4>
                    <select class="custom-select " id="jenis-surat" autofocus="">
                        <option disabled="" selected="">
                            Pilih Jenis Surat
                        </option>
                        @foreach($surat as $item)
                        <option class="list-group-item" value="{{$item['jenis_surat_id']}}">
                            {{$item['nama']}}
                        </option>
                        @endforeach
                    </select>
                    <div class="mt-3">
                        <h5>
                            Berkas yang perlu dipersiapkan
                        </h5>
                        <ol id="persyaratan">
                            <li>
                                Tidak ada
                            </li>
                        </ol>
                        <a href="" class="btn btn-success disabled float-right" id="link-pengajuan">Ajukan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const jenisSurat = document.querySelector('#jenis-surat');
    const nodePersyaratan = document.querySelector('#persyaratan');
    const persyaratan = @json($persyaratan);
    const linkPengajuan = document.querySelector('#link-pengajuan');
    jenisSurat.addEventListener('change', () => {
        nodePersyaratan.textContent = null;
        linkPengajuan.classList.remove('disabled');
        linkPengajuan.href = "{{route('ajukan.warga', 1)}}".replace("1", jenisSurat.value);
        if(persyaratan[jenisSurat.value]) {   
            persyaratan[jenisSurat.value].forEach( (item) => {
                let node = document.createElement("li");
                let textNode = document.createTextNode(item);
                node.appendChild(textNode);
                nodePersyaratan.appendChild(node);
            }) ;
        } else {
            let node = document.createElement("li");
            let textNode = document.createTextNode(item);
            node.appendChild(textNode);
            nodePersyaratan.appendChild(node);
        }
    })
</script>
@endsection