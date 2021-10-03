<?php

namespace App\Http\Controllers;

use App\Http\Requests\people\StorePersonRequest;
use App\Http\Requests\people\UpdatePersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeopleController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return view("people.index", compact("people"));
    }

    public function create()
    {
        return view("people.create");
    }

    public function store(StorePersonRequest $request)
    {
        $fileName = time() . "_" . $request->banner->getClientOriginalName();
        Storage::disk("public")->putFileAs("people/", $request->banner, $fileName);
        $person = Person::query()->create([
            "name" => $request->name,
            "banner" => $fileName,
            "education" => $request->education,
            "telegram" => $request->telegram,
            "instagram" => $request->instagram,
            "linkedin" => $request->linkedin,
        ]);
        return redirect()->route("people.index");
    }

    public function edit($id)
    {
        $person = Person::query()->findOrFail($id);
        return view("people.edit", compact("person"));

    }

    public function update(UpdatePersonRequest $request, $id)
    {
        $person = Person::query()->findOrFail($id);
        $person->name = $request->name;
        $person->banner = $request->banner;
        $person->education = $request->education;
        $person->telegram = $request->telegram;
        $person->instagram = $request->instagram;
        $person->linkedin = $request->linkedin;
        if ($request->banner) {
            Storage::disk("public")->delete("people/" . $person->banner);
            $fileName = time() . "_" . $request->banner->getClientOriginalName();
            Storage::disk("public")->putFileAs("people/", $request->banner, $fileName);
            $person->banner = $fileName;
        }
        $person->save();
        return redirect()->route("people.index");
    }

    public function destroy($id)
    {
        $person = Person::query()->findOrFail($id);
        $person->delete();
        return redirect()->route("people.index");
    }
}
