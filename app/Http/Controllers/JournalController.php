<?php

namespace App\Http\Controllers;

use App\Http\Requests\journal\StoreJournalRequest;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JournalController extends Controller
{
    public function create()
    {
        return view("journal.create");
    }

    public function store(StoreJournalRequest $request)
    {
        $fileName = time() . "_" . $request->banner->getClientOriginalName();
        Storage::disk("public")->putFileAs("journals/", $request->banner, $fileName);
        Journal::query()->create([
            "user_id" => auth()->id(),
            "name" => $request->name,
            "banner" => $fileName,
        ]);
    }

    public function index()
    {
        $journals = Journal::with("user")->get();
        return view("journal.index",compact("journals"));
    }
}
