@extends("dashboard.layouts.main")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">edit person _ {{ $person->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('people.update',$person->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label>name</label>
                                    <input name="name" type="text" class="form-control" placeholder="name"
                                           value="{{ $person->name }}">
                                </div>
                                @error("name")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label>education</label>
                                    <input name="education" type="text" class="form-control" placeholder="education"
                                           value="{{ $person->education }}">
                                </div>
                                @error("education")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label>telegram</label>
                                    <input name="telegram" type="text" class="form-control" placeholder="telegram"
                                           value="{{ $person->telegram }}">
                                </div>
                                @error("telegram")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label>instagram</label>
                                    <input name="instagram" type="text" class="form-control" placeholder="instagram"
                                           value="{{ $person->instagram }}">
                                </div>
                                @error("instagram")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label>linkedin</label>
                                    <input name="linkedin" type="text" class="form-control" placeholder="linkedin"
                                           value="{{ $person->linkedin }}">
                                </div>
                                @error("linkedin")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <input id="image_inp" type="file" name="banner" accept="image/*">
                            <div class="image_picker m-auto">
                                <img id="image_changer" width="100" src="{{ $person->avatar }}" alt="">
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
