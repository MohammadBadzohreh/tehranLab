<?php

namespace App\Http\Requests\rolePermissions;

use Illuminate\Foundation\Http\FormRequest;

class editUserRoleRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            "roles" => ["array","max:1"],
            "roles.*" => ["nullable", "exists:roles,name"],
        ];
    }
}
