<?php

namespace App\Http\Controllers;

use App\Http\Requests\dashboard\EditProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user()
    {
        return view("Dashboard.user");
    }

    public function edit_profile(EditProfileRequest $request,$id)
    {
        $user = User::query()->findOrFail($id);
        $user->update([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'company' => $request->company,
            'about' => $request->about,
        ]);
        return redirect()->back();
    }
}
