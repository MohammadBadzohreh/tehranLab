@extends("dashboard.layouts.main")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card_head">
                    <h4 class="card-title">peolpe</h4>
                    <a href="{{ route("people.create") }}">add person</a>
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
                                    education
                                </th>
                                <th>
                                    banner
                                </th>
                                <th>
                                    actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($people as $person)
                                <tr>
                                    <td>
                                        {{ $person->id }}
                                    </td>
                                    <td>
                                        {{ $person->name }}
                                    </td>
                                    <td>
                                        {{ $person->education }}

                                    </td>
                                    <td>
                                        <img width="100" src="{{ $person->avatar }}" alt="{{ $person->name }}">
                                    </td>

                                    <td class="actions">
                                        <a href="{{ route('people.edit',$person->id) }}">
                                            <img src="{{ asset('images/icons/pencil.svg') }}" alt="">
                                        </a>
                                        <form id="delete_person_{{ $person->id }}" style="display: none" method="post"
                                              action="{{ route('people.destroy',$person->id) }}">
                                            <input type="hidden" name="id" value="{{ $person->id }}">
                                            @method("delete")
                                            @csrf
                                            <input type="submit" value="submit">
                                        </form>
                                        <img src="{{ asset('images/icons/remove.svg') }}" alt="{{ $person->name }}"
                                             onclick="handleDeletePerson('{{ $person->id }}')">
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
        function handleDeletePerson(id) {
            const str = '#delete_person_' + id;
            $(str).submit();
        }
    </script>
@endsection

