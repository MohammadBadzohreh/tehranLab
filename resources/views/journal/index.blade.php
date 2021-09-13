@extends("dashboard.layouts.main")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Simple Table</h4>
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
                                    user
                                </th>
                                <th>
                                    banner
                                </th>
                                <th>
                                    name
                                </th>
                                <th>
                                    actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($journals as $journal)
                                <tr>
                                    <td>
                                        {{ $journal->id }}
                                    </td>
                                    <td>
                                        {{ $journal->user->name }}

                                    </td>
                                    <td>
                                        <img width="100" src="{{ $journal->avatar }}" alt="{{ $journal->name }}">
                                    </td>
                                    <td>
                                        {{ $journal->name }}
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('journal.edit',$journal->id) }}">
                                            <img src="{{ asset('images/icons/pencil.svg') }}" alt="">
                                        </a>
                                        <form id="delete_journal_{{ $journal->id }}" style="display: none" method="post"
                                              action="{{ route('journal.delete') }}">
                                            <input type="hidden" name="id" value="{{ $journal->id }}">
                                            @method("delete")
                                            @csrf
                                            <input type="submit" value="submit">
                                        </form>
                                        <img src="{{ asset('images/icons/remove.svg') }}" alt="{{ $journal->name }}"
                                             onclick="handleDeleteJournal('{{ $journal->id }}')">
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
        function handleDeleteJournal(id) {
            const str = '#delete_journal_' + id;
            $(str).submit();
        }
    </script>
@endsection
