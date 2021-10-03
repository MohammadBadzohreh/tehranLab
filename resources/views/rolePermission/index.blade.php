@extends("dashboard.layouts.main")

@section("content")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card_head">
                    <h4 class="card-title">roles</h4>
                    <a href="{{ route("role.create") }}">add role</a>
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
                                <th>
                                    permissions
                                </th>
                                <th>
                                    actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>
                                        {{ $role->id }}
                                    </td>
                                    <td>
                                        {{ $role->name }}

                                    </td>

                                    <td>
                                        @foreach($role->permissions as $permission)
                                            {{ $permission->name }}
                                            <br>
                                        @endforeach

                                    </td>

                                    <td class="actions">
                                        <a href="{{ route('role.edit',$role->id) }}">
                                            <img src="{{ asset('images/icons/pencil.svg') }}" alt="edit role">
                                        </a>
                                        <form id="delete_role_{{ $role->id }}" style="display: none" method="post"
                                              action="{{ route('role.destroy',$role->id) }}">
                                            @method("delete")
                                            @csrf
                                            <input type="submit" value="submit">
                                        </form>
                                        <img src="{{ asset('images/icons/remove.svg') }}" alt="delete role"
                                             onclick="handleDeleteRole('{{ $role->id }}')">
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
            const delete_article = '#delete_role_' + id;
            $(delete_article).submit();
        }
    </script>
@endsection
