@extends("dashboard.layouts.main")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card_head">
                    <h4 class="card-title">categories</h4>
                    <a href="{{ route('category.create') }}">add category</a>
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
                                    title
                                </th>
                                <th>
                                    content
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        {{ $category->id }}
                                    </td>
                                    <td>
                                        {{ $category->user->name ?? "_" }}

                                    </td>

                                    <td>
                                        {{ $category->title }}

                                    </td>

                                    <td>
                                        {{ $category->body }}
                                    </td>

                                    <td class="actions">
                                        <a href="{{ route('article.edit',$category->id) }}">
                                            <img src="{{ asset('images/icons/pencil.svg') }}" alt="edit article">
                                        </a>
                                        <form id="delete_category_{{ $category->id }}" style="display: none" method="post"
                                              action="{{ route('article.destroy',$category->id) }}">
                                            @method("delete")
                                            @csrf
                                            <input type="submit" value="submit">
                                        </form>
                                        <img src="{{ asset('images/icons/remove.svg') }}" alt="delete article"
                                             onclick="handleDeleteArticle('{{ $category->id }}')">
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
            const delete_category = '#delete_category_' + id;
            $(delete_category).submit();
        }
    </script>
@endsection

