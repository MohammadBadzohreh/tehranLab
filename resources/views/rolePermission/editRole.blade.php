@extends("dashboard.layouts.main")

@section("content")

    @extends("dashboard.layouts.main")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">edit role _ {{ $role->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('role.update',$role->id) }}" method="post">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label>name</label>
                                    <input name="name" type="text" class="form-control" placeholder="name"
                                           value="{{ $role->name }}">
                                </div>
                                @error("name")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            @foreach($permissions as $id=>$permission)
                                <div class="form-check">
                                    <label class="form-check-label">
                                        {{ $permission }}
                                        <input name="permissions[]" class="form-check-input" type="checkbox"
                                               value="{{ $id }}"
                                               @if($role->hasPermissionTo($permission)) checked="checked" @endif>
                                        <span class="form-check-sign"></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error("permissions")
                        <div class="validation_error">{{ $message }}</div>
                        @enderror
                        <div class="mt-5">
                            <button class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
