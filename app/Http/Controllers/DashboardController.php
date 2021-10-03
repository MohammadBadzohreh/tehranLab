<?php

namespace App\Http\Controllers;

use App\Http\Requests\dashboard\EditProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function edit_avatar_user(UpdateUserProfileRequest $request)
    {
        dd($request->all());
        $user =User::query()->findOrFail(auth()->id());
        if (auth()->user()->banner) {
            Storage::disk("public")->delete("users/" . $user->banner);
        }
        $fileName = time() . "_" . $request->banner->getClientOriginalName();
        Storage::disk("public")->putFileAs("users/", $request->banner, $fileName);
        $user->banner = $fileName;
        $user->save();
        return redirect()->back();
    }
}
