<?php

namespace App\Http\Requests\rolePermissions;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            "name" => ["required", "string", "min:3", "unique:roles,name," . $this->id],
            "permissions" => "required|array|min:1",
            "permissions.*" => "exists:permissions,id"
        ];
    }
}
