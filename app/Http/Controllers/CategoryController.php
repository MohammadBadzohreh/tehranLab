<?php

namespace App\Http\Controllers;

use App\Http\Requests\categories\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest\categories;
use App\Http\Requests\UploadImageRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("category.index", compact("categories"));
    }

    public function create(StoreCategoryRequest $request)
    {
        return view("category.create");
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::query()->create([
            "user_id" => auth()->id(),
            'title' => $request->title,
            "body" => $request->body,
        ]);
        return redirect()->route("category.index");

    }

    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);
        return view("category.edit", compact("category"));

    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::query()->findOrFail($id);
        $category->update([
            "user_id" => auth()->id(),
            'title' => $request->title,
            "body" => $request->body,
        ]);
        return redirect()->route("category.index");
    }

    public function destroy($id)
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();
        return redirect()->route("category.index");

    }

    public function show($id)
    {

    }

    public function uploadImage(UploadImageRequest $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('categoryImages'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('categoryImages/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }

    }
}
