<?php

namespace App\Http\Requests\news;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            "title" => "required|string|unique:newses,title|min:5",
            "banner" => "required|image|mimes:jpeg,png,jpg",
            "body" => "string",
        ];
    }
}
