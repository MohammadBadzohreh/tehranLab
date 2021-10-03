@extends("dashboard.layouts.main")

@section("content")

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('edit.profile',auth()->id()) }}" method="post">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input name="company" type="text" class="form-control" placeholder="Company"
                                           value="{{ auth()->user()->company }}">
                                </div>
                                @error("company")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="name" type="text" class="form-control" placeholder="Username"
                                           value="{{ auth()->user()->name }}">
                                </div>
                                @error("Username")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input name="email" type="email" class="form-control" placeholder="Email"
                                           disabled="disabled"
                                           value="{{ auth()->user()->email }}">
                                </div>
                                @error("email")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                           value="{{ auth()->user()->first_name }}">
                                </div>
                                @error("first_name")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                           value="{{ auth()->user()->last_name }}">
                                </div>
                                @error("last_name")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Home Address"
                                           value="{{ auth()->user()->address }}">
                                </div>
                                @error("address")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>About Me</label>
                                    <textarea name="about" rows="4" cols="80" class="form-control"
                                              placeholder="Here can be your description">{!! auth()->user()->about !!}</textarea>
                                </div>
                                @error("about")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="{{asset('./dashboard/img/bg5.jpg')}}" alt="...">
                </div>
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="{{ auth()->user()->avatar }}" alt="...">
                            <form id="form" action="{{ route('edit.avatar.user') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("put")
                                <input id="image_inp" type="file" name="avatar" accept="image/*">
                            </form>
                            <div class="image_picker m-auto">
                                <img id="image_changer" src="{{ asset('/dashboard/img/icons/upload.png') }}" alt="">
                            </div>
                            <h5 class="title">{{ auth()->user()->first_name." ".auth()->user()->last_name }}</h5>
                        </a>
                        <p class="description">
                            {{ auth()->user()->username }}
                        </p>
                    </div>
                    <p class="description text-center">
                        {!! auth()->user()->about !!}
                    </p>

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
        document.getElementById("image_inp").onchange = function() {
            document.getElementById("form").submit();
        };
    </script>
@endsection
