@extends('layouts.admin')

@section('content')
<div class="row">
  <div style="margin-left: 15px;"><h2>Pemberitahuan</h2></div>
  <div class="col-lg-3" style="margin-left: 15px;">
    <a href="{{route('post.create')}}" class="btn btn-primary" style="padding: 2px;"><i class="fas fa-plus"></i> Buat Pemberitahuan Baru </a>
  </div>
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
                    <th colspan="3" align='center'>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($posts as $post)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post['post_judul']}}</td>
                    <td class="isi">{{$post['post_isi']}}</td>
                    <td>{{date('d/m/y h:m', strtotime($post['created_at']))}}</td>
                    <td>{{date('d/m/y h:m', strtotime($post['updated_at']))}}</td>
                    <td><a href="{{route('post.show', $post['post_id'])}}" class="btn btn-info" ><i class="fas fa-eye"></i></a></td>
                    <td><a href="{{route('post.edit', $post['post_id'])}}" class="btn btn-info" ><i class="fas fa-edit"></i></a></td>
                      <td><form method="POST" action="{{route('post.destroy', $post['post_id'])}}" >
                      {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-info" type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                      </form>
                    </td>
                    @endforeach
                </tbody>
              </table>
            </div>
           {{$posts->links()}}
      </div>
    </div>
  </div>
</div>

@endsection