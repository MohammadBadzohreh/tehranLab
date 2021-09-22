@extends("dashboard.layouts.main")

@section("content")

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.editRole',request()->id) }}" method="post">
                        @csrf
                        @method("post")
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="name" type="text" disabled class="form-control" placeholder="Username"
                                           value="{{ auth()->user()->name }}">
                                </div>
                                @error("Username")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input name="email" type="email" disabled class="form-control" placeholder="Email"
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
                                    <input type="text" name="first_name" disabled class="form-control"
                                           placeholder="First Name"
                                           value="{{ auth()->user()->first_name }}">
                                </div>
                                @error("first_name")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" disabled class="form-control"
                                           placeholder="Last Name"
                                           value="{{ auth()->user()->last_name }}">
                                </div>
                                @error("last_name")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        {{ $role->name }}
                                        <input name="roles[]" class="form-check-input" type="checkbox"
                                               value="{{ $role->name }}"
                                               @if($user->hasRole($role)) checked="checked" @endif>
                                        <span class="form-check-sign"></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error("roles")
                        <div class="validation_error">{{ $message }}</div>
                        @enderror
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
                            <img class="avatar border-gray" src="{{ asset('./dashboard/img/mike.jpg') }}" alt="...">
                            <input id="image_inp" type="file" name="avatar" accept="image/*">
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
    </script>
@endsection
