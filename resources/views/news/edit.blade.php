@extends("dashboard.layouts.main")
@section("css")
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <style>
        #cke_editor {
            width: 100%;
        }
    </style>
@endsection
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">edit news</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('news.update',$news->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label>title</label>
                                    <input name="title" type="text" class="form-control" placeholder="title"
                                           value="{{ $news->title }}">
                                </div>
                                @error("title")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <input id="image_inp" type="file" name="banner" accept="image/*">
                            <div class="image_picker m-auto">
                                <img id="image_changer1" width="300" src="{{ $news->avatar }}"
                                     alt="avatar image">
                                <span>current banner</span>
                            </div>
                        </div>
                        @error("banner")
                        <div class="validation_error">{{ $message }}</div>
                        @enderror

                        <div class="row pt-4 px-2">
                            <textarea name="body" id="editor">{!! $news->body !!}</textarea>
                        </div>
                        @error("body")
                        <div class="validation_error">{{ $message }}</div>
                        @enderror
                        <div>
                            <button class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        $("#image_changer1").click(function () {
            $("#image_inp").click();
        });
    </script>
@endsection
