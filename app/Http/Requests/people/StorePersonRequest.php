<?php

namespace App\Http\Requests\people;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => "required|string",
            "banner" => "required|image",
            "education" => "required|string",
            "telegram" => "nullable|url",
            "instagram" => "nullable|url",
            "linkedin" => "nullable|url",
        ];
    }

    public function messages()
    {
        return [
            "telegram" => "telegram must be url.",
            "instagram" => "instagram must be url.",
            "linkedin" => "linkedin must be url.",
        ];
    }
}
