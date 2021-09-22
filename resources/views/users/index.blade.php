@extends("dashboard.layouts.main")

@section("content")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">users</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    id
                                </th>
                                <th>
                                    name
                                </th>
                                <th>email</th>
                                <th>
                                    roles
                                </th>
                                <th>
                                    actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        {{ $user->name }}

                                    </td>

                                    <td>
                                        {{ $user->email }}

                                    </td>

                                    <td>
                                        @if($user->roles->count())
                                            @foreach($user->roles as $role)
                                                {{ $role->name }}
                                                <br>
                                            @endforeach
                                        @else
                                            <span>__</span>
                                        @endif
                                    </td>

                                    <td class="actions">
                                        <a href="{{ route('user.editRole',$user->id) }}">
                                            <img src="{{ asset('images/icons/pencil.svg') }}" alt="edit user">
                                        </a>
                                        <form id="delete_user_{{ $user->id }}" style="display: none" method="post"
                                              action="{{ route('user.destroy',$user->id) }}">
                                            @method("delete")
                                            @csrf
                                            <input type="submit" value="submit">
                                        </form>
                                        <img src="{{ asset('images/icons/remove.svg') }}" alt="delete user"
                                             onclick="handleDeleteRole('{{ $user->id }}')">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("js")
    <script type="text/javascript">
        function handleDeleteRole(id) {
            const delete_article = '#delete_user_' + id;
            $(delete_article).submit();
        }
    </script>
@endsection
