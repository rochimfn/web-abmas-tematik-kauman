

@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-lg-3">
    <a href="{{route('post.create')}}" class="btn btn-primary btn-rounded btn-fw"><i class="fas fa-plus"></i> Buat Pemberitahuan Baru </a>
  </div>

    <div class="col-lg-12">
      @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
      @endif
      </div>
</div>
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
       <div class="card-body">
          <h4 class="card-title">Semua Pemberitahuan</h4>
            <div class="table-responsive">
              <table class="table table-striped" id="tabel">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Isi Pemberitahuan</th>
                    <th>Dibuat</th>
                    <th>Terakhir diedit</th>
                    <th colspan="2" align="center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($posts as $post)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post['judul']}}</td>
                    <td>{{$post['isi']}}</td>
                    <td>{{date('d/m/y h:m', strtotime($post['created_at']))}}</td>
                    <td>{{date('d/m/y h:m', strtotime($post['updated_at']))}}</td>
                    <td>
                    <a href="{{route('post.edit', $post['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                      <td><form method="POST" action="{{route('post.destroy', $post['id'])}}" >
                      {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-info" type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                      </form>
                    </td>
                    @endforeach
                </tbody>
              </table>
            </div>
           
        </div>
      </div>
    </div>
</div>

@endsection


