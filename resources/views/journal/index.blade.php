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
                                <th class="text-right">
                                    name
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
                                        <img width="100"  src="{{ $journal->avatar }}" alt="{{ $journal->name }}">
                                    </td>
                                    <td class="text-right">
                                        {{ $journal->name }}
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
