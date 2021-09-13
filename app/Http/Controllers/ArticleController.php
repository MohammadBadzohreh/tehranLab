<?php

namespace App\Http\Controllers;

use App\Http\Requests\article\StoreArticleRequest;
use App\Models\Article;
use App\Models\Journal;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        $journals = Journal::all();
        return view("articles.create",compact("journals"));

    }

    public function store(StoreArticleRequest $request)
    {
        
    }

    public function edit()
    {
        return view("articles.edit");
    }
    public function update()
    {

    }

    public function index()
    {
        return view("articles.index");
    }

    public function destroy()
    {

    }

    public function show()
    {

    }
}
