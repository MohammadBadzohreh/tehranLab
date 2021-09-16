@extends("dashboard.layouts.main")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">add an article</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('article.update',$article->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input name="title" id="title" type="text" class="form-control" placeholder="title"
                                           value="{{ $article->title }}">
                                </div>
                                @error("title")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label for="journal">journal</label>
                                    <select name="journal_id" id="journal" class="select form-control">
                                        @foreach($journals as $journal)
                                            <option value="{{ $article->journal->id }}">{{ $article->journal->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error("journal_id")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <input id="image_inp" type="file" name="file" accept="application/pdf,application/vnd.ms-excel">
                                <div class="image_picker m-auto">
                                    <img id="file_selector" style="display: block; margin: auto"
                                         src="{{ asset('/dashboard/img/icons/upload.png') }}" alt="file selector">
                                </div>
                                @error("file")
                                <div class="validation_error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 pb-1">
                                <div class="form-group">
                                    <label for="summry">summry</label>
                                    <textarea name="summry" class="form-control" id="summry" cols="30"
                                              rows="10">{!! $article->summry !!}</textarea>

                                    @error("summry")
                                    <div class="validation_error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        $("#file_selector").click(function () {
            $("#image_inp").click();
        });
    </script>
@endsection
