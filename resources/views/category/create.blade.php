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
                    <h5 class="title">add category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <div class="row">
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input name="title" id="title" type="text" class="form-control" placeholder="title"
                                           value="{{ old('title') }}">
                                </div>
                                @error("title")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <textarea name="body" id="editor">{!! old('body') !!}</textarea>
                            </div>
                            @error("body")
                            <div class="validation_error">{{ $message }}</div>
                            @enderror
                        </div>
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
            filebrowserUploadUrl: "{{route('category.ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection

