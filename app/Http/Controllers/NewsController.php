<?php

namespace App\Http\Controllers;

use App\Http\Requests\news\StoreNewsRequest;
use App\Http\Requests\UploadImageRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index()
    {
        $newses = News::query()->with("user")->orderBy("id", "DESC")->get();
        return view("news.index", compact("newses"));
    }


    public function create()
    {
        return view("news.create");
    }


    public function store(StoreNewsRequest $request)
    {
        $fileName = time() . "_" . $request->banner->getClientOriginalName();
        Storage::disk("public")->putFileAs("newsesBanner/", $request->banner, $fileName);
        News::query()->create([
            "user_id" => auth()->id(),
            "title" => $request->title,
            "banner" => $fileName,
            "body" => $request->body,
        ]);
        return redirect()->route("news.index");
    }

    public function show($id)
    {
        return view("news.show");
    }


    public function edit($id)
    {
        $news = News::query()->findOrFail($id);
        return view("news.edit", compact("news"));
    }

    public function update(Request $request, $id)
    {
        $news = News::query()->findOrFail($id);
        $news->title = $request->title;
        if ($request->hasFile("banner")) {
            Storage::disk("public")->delete("newsesBanner/" . $news->banner);
            $fileName = time() . "_" . $request->banner->getClientOriginalName();
            Storage::disk("public")->putFileAs("newsesBanner/", $request->banner, $fileName);
        }
        $news->banner = $fileName;
        $news->body  = $request->body;
        $news->save();
        return redirect()->route("news.index");
    }

    public function destroy($id)
    {
        $news = News::query()->findOrFail($id);
        $news->delete();
        return redirect()->route("news.index");
    }

    public function uploadImage(UploadImageRequest $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('newsImages'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('newsImages/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
