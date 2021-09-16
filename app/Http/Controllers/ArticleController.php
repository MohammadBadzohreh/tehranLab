<?php

namespace App\Http\Controllers;

use App\Http\Requests\article\StoreArticleRequest;
use App\Http\Requests\article\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Journal;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function create()
    {
        $journals = Journal::all();
        return view("articles.create", compact("journals"));

    }

    public function store(StoreArticleRequest $request)
    {
        $file_name = time() . "_" . $request->file->getClientOriginalName();
        Storage::disk("public")->putFileAs("articles/", $request->file, $file_name);
        Article::query()->create([
            "user_id" => auth()->id(),
            "journal_id" => $request->journal_id,
            "title" => $request->title,
            "file" => $file_name,
            "summry" => $request->summry
        ]);
        return redirect()->route("article.index");
    }

    public function edit($id)
    {
        $journals = Journal::all();
        $article = Article::query()->findOrFail($id);
        return view("articles.edit", compact("article", "journals"));
    }

    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::query()->findOrFail($id);
        $article->journal_id = $request->journal_id;
        $article->title = $request->title;
        $article->summry = $request->summry;
        if ($request->hasFile("file")) {
            Storage::disk("public")->delete("articles/" . $article->file);
            $file_name = time() . "_" . $request->file->getClientOriginalName();
            Storage::disk("public")->putFileAs("articles/", $request->file, $file_name);
            $article->file = $file_name;
        }
        $article->save();
        return redirect()->route("article.index");
    }

    public function index()
    {
        $articles = Article::with(["journal", "user"])->get();
        return view("articles.index", compact("articles"));
    }

    public function destroy($id)
    {
        $article = Article::query()->findOrFail($id);
        $article->delete();
        return redirect()->route("article.index");
    }

    public function show()
    {

    }
}
