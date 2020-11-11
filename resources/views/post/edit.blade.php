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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" color:rgb(123, 104, 238)>{{ __('Edit Pemberitahuan') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{route('post.update',  $post['post_id'])}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('post_judul') ? ' has-error' : '' }}">
                                    <label for="post_judul" class="col-md-10 control-label">Judul</label>
                                    <div class="col-md-30">
                                        <input id="post_judul" type="text" class="form-control" name="post_judul" value="{{ $post->post_judul }}" required>
                                         @if ($errors->has('post_judul'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('post_judul') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('post_isi') ? ' has-error' : '' }}">
                                    <label for="post_isi" class="col-md-10 control-label">Isi Pemberitahuan</label>
                                    <textarea id="post_isi" type="text" class="form-control" name="post_isi" rows="15" value="{{ $post->post_isi }}" required></textarea>
                                    @if ($errors->has('post_isi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_isi') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary" id="submit">Update</button>
                                        <a href="{{route('post.index')}}" class="btn btn-light pull-right">Kembali</a>
                                    </div>
                                </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection