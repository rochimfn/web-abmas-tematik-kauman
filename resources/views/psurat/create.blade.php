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

<div class="container" style="margin-top: 50px;" >
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" color:rgb(123, 104, 238)>{{ __('Buat Pemberitahuan Baru') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('post_judul') ? ' has-error' : '' }}">
                                    <label for="post_judul" class="col-md-10 control-label">Judul</label>
                                    <div class="col-md-30">
                                        <input id="post_judul" type="text" class="form-control" name="post_judul" value="{{ old('post_judul') }}" required>
                                         @if ($errors->has('post_judul'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('post_judul') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('post_isi') ? ' has-error' : '' }}">
                                    <label for="post_isi" class="col-md-10 control-label">Isi Pemberitahuan</label>
                                    <textarea id="post_isi" type="text" class="form-control" name="post_isi"  rows="15" value="{{ old('post_isi')}}" required></textarea>
                                    @if ($errors->has('post_isi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_isi') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-5 offset-md-4" align='center'>
                                        <button type="submit" class="btn btn-primary" id="submit" data-toggle="modal" data-target="#createpost_modal">Kirim</button>
                                        <a href="{{route('post.index')}}" class="btn btn-secondary"> Kembali</a>
                                    </div>
                                </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="createpost_modal" class="modal fade" role="dialog" style="margin-top: 150px;">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
                    <h4 class="modal-title">Pemberitahuan Berhasil Dikirim</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Pemberitahuan telah berhasil dikirim, kini admin dan warga dapat melihat pemberitahuan tersebut pada halaman pertama aplikasi.</p>
				</div>
				<!-- footer modal -->
				
			</div>
		</div>
    </div>
    
</div>
@endsection