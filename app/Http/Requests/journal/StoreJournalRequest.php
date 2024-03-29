<?php

namespace App\Http\Requests\journal;

use Illuminate\Foundation\Http\FormRequest;

class StoreJournalRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            "name" => "required|string|unique:journals,name|min:2|max:40",
            "banner" => "required|image|mimes:jpeg,png,jpg",
        ];
    }
}
