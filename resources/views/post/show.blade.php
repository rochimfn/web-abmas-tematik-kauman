@extends('layouts.admin')

@section('content')
<div class="container">
    <div style="margin-left: 20px;"><h2 class="mb-4">Detail Pemberitahuan</h2></div>
    <div class="header-body">
        <div class="row">
            <div class="col-xl-10 col-lg-6">
                <div class="card card-stats mb-3">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col">
                                <h5 class="card-stats-title">Judul</h5>
                                <div class="card-stats-item">
                                    <div>{{$post->post_judul}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="card-stats-title">Isi Pemberitahuan</h5>
                                <div class="card-stats-item">
                                    <div>{{$post->post_isi}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div align='center'>
                    <a href="{{route('post.edit', $post['post_id'])}}" class="btn btn-info">Edit</a>
                    <a href="{{route('post.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection