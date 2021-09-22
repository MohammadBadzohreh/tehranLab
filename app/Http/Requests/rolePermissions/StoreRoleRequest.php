<?php

namespace App\Http\Requests\rolePermissions;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            "name" => "required|string|min:3|unique:roles,name",
            "permissions" => "required|array|min:1",
            "permissions.*" => "exists:permissions,id"
        ];
    }
}
