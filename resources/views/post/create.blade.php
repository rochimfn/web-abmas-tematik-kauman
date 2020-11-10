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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" color:rgb(123, 104, 238)>{{ __('Buat Pemberitahuan Baru') }}</div>
                <div class="card-body">
                    <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label for="judul" class="col-md-24 control-label">Judul</label>
                            <div class="col-md-30">
                                <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required>
                                @if ($errors->has('judul'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
                            <label for="isi" class="col-md-24 control-label">Isi Pemberitahuan</label>
                            <textarea id="isi" type="text" class="form-control" name="isi" rows="12" value="{{ old('isi')}}" required></textarea>
                            @if ($errors->has('isi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('isi') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submit">Kirim</button>
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