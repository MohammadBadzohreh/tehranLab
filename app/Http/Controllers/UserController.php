<?php

namespace App\Http\Controllers;

use App\Http\Requests\rolePermissions\editUserRoleRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::with("roles")->get();
        return view("users.index", compact("users"));
    }

    public function delete($id)
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
        return redirect()->route("users.index");

    }

    public function editRole($id)
    {
        $user = User::query()->findOrFail($id);
        $roles = Role::query()->get();
        return view("rolePermission.editUserRole", compact("user", "roles"));
    }

    public function editRoleUser(editUserRoleRequest $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $user->syncRoles($request->roles);
        return redirect()->route("users.index");
    }
}
