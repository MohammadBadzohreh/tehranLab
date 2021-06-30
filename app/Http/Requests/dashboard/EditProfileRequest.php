<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'first_name' => ["required", "string", "min:3", "max:255"],
            'last_name' => ["required", "string", "min:3", "max:255"],
            'address' => "string",
            'company' => "nullable|string|min:3",
        ];
    }
}
