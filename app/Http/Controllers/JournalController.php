<?php

namespace App\Http\Controllers;

use App\Http\Requests\journal\DeleteJournalRequest;
use App\Http\Requests\journal\StoreJournalRequest;
use App\Http\Requests\journal\UpdateJournalRequest;
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
        return view("journal.index");
    }

    public function index()
    {
        $journals = Journal::with("user")->get();
        return view("journal.index", compact("journals"));
    }

    public function edit($id)
    {
        $journal = Journal::query()->findOrFail($id);
        return view("journal.edit", compact('journal'));
    }

    public function update(UpdateJournalRequest $request, $id)
    {
        $journal = Journal::query()->findOrFail($id);
        $journal->name = $request->name;
        if ($request->banner) {
            Storage::disk("public")->delete("journals/" . $journal->banner);
            $fileName = time() . "_" . $request->banner->getClientOriginalName();
            Storage::disk("public")->putFileAs("journals/", $request->banner, $fileName);
            $journal->banner = $fileName;
        }
        $journal->save();
        return redirect()->route("journal.index");
    }

    public function delete(DeleteJournalRequest $request)
    {
        $journal = Journal::query()->findOrFail($request->id);
        $journal->delete();
        return redirect()->route("journal.index");
    }
}
