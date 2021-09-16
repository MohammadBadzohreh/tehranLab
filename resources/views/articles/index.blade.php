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
                                    journal
                                </th>
                                <th>
                                    title
                                </th>
                                <th>
                                    summry
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>
                                        {{ $article->id }}
                                    </td>
                                    <td>
                                        {{ $article->user->name ?? "_" }}

                                    </td>

                                    <td>
                                        {{ $article->journal->name ?? "_" }}

                                    </td>

                                    <td>
                                        {{ $article->title }}

                                    </td>

                                    <td>
                                        {{ $article->summry }}
                                    </td>

                                    <td class="actions">
                                        <a href="{{ route('article.edit',$article->id) }}">
                                            <img src="{{ asset('images/icons/pencil.svg') }}" alt="edit article">
                                        </a>
                                        <form id="delete_article_{{ $article->id }}" style="display: none" method="post"
                                              action="{{ route('article.destroy',$article->id) }}">
                                            @method("delete")
                                            @csrf
                                            <input type="submit" value="submit">
                                        </form>
                                        <img src="{{ asset('images/icons/remove.svg') }}" alt="delete article"
                                             onclick="handleDeleteArticle('{{ $article->id }}')">
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
        function handleDeleteArticle(id) {
            const delete_article = '#delete_article_' + id;
            $(delete_article).submit();
        }
    </script>
@endsection

