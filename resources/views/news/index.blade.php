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
                                    writer
                                </th>
                                <th>
                                    title
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
                            @foreach($newses as $news)
                                <tr>
                                    <td>
                                        {{ $news->id }}
                                    </td>
                                    <td>
                                        {{ $news->user->name }}

                                    </td>
                                    <td>
                                        {{ $news->title }}
                                    </td>
                                    <td>
                                        <img width="100" src="{{ $news->avatar }}" alt="banner">
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('news.edit',$news->id) }}">
                                            <img src="{{ asset('images/icons/pencil.svg') }}" alt="">
                                        </a>
                                        <form id="delete_news_{{ $news->id }}" style="display: none" method="post"
                                              action="{{ route('news.destroy',$news->id) }}">
                                            <input type="hidden" name="id" value="{{ $news->id }}">
                                            @method("delete")
                                            @csrf
                                            <input type="submit" value="submit">
                                        </form>
                                        <img src="{{ asset('images/icons/remove.svg') }}" alt="{{ $news->name }}"
                                             onclick="handleDeleteJournal('{{ $news->id }}')">
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
            const str = '#delete_news_' + id;
            $(str).submit();
        }
    </script>
@endsection
