@extends("dashboard.layouts.main")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">add journal</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('journal.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <div class="row">
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label>name</label>
                                    <input name="name" type="text" class="form-control" placeholder="name"
                                           value="{{ old('name') }}">
                                </div>
                                @error("name")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <input id="image_inp" type="file" name="banner" accept="image/*">
                            <div class="image_picker m-auto">
                                <img id="image_changer" width="100" src="{{ asset('/dashboard/img/icons/upload.png') }}" alt="">
                            </div>
                        </div>
                        @error("banner")
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
    $("#image_changer").click(function () {
        $("#image_inp").click();
    });
</script>
@endsection
