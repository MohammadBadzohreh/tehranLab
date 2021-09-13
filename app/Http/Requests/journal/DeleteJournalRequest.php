<?php

namespace App\Http\Requests\journal;

use Illuminate\Foundation\Http\FormRequest;

class DeleteJournalRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            "id"=>"required"
        ];
    }
}
