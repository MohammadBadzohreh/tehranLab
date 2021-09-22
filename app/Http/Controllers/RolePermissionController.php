<?php

namespace App\Http\Controllers;

use App\Http\Requests\rolePermissions\StoreRoleRequest;
use App\Http\Requests\rolePermissions\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function createRole()
    {
        $permissions = Permission::query()->pluck("name", "id");
        return view("rolePermission.createRole", compact("permissions"));
    }

    public function storeRole(StoreRoleRequest $request)
    {
        $role = Role::query()->create(["name" => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route("role.index");
    }

    public function index()
    {
        $roles = Role::with("permissions")->get();
        return view("rolePermission.index", compact("roles"));
    }

    public function edit($id)
    {
        $permissions = Permission::query()->pluck("name", "id");
        $role = Role::query()->findOrFail($id);
        return view("rolePermission.editRole", compact("role", "permissions"));
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::query()->findOrFail($id);
        $role->update([
            "name" => $request->name,
        ]);
        $role->syncPermissions($request->permissions);
        return redirect()->route("role.index");
    }

    public function delete($id)
    {
        $role = Role::query()->findOrFail($id);
        $role->delete();
        return redirect()->route("role.index");
    }
}
