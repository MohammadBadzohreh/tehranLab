<?php

namespace App\Http\Requests\article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            "journal_id" => "required|exists:journals,id",
            "title" => "required|string|unique:articles,title,".$this->article,
            "file" => "nullable|mimes:pdf",
            "summry" => "required|string",
        ];
    }
}
