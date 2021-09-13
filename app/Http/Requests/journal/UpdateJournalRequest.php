<?php

namespace App\Http\Requests\journal;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJournalRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            "name" => ["required", "string", "unique:journals,name,".$this->id , "min:2", "max:40"],
            "banner" => "nullable|image|mimes:jpeg,png,jpg",
        ];
    }
}
