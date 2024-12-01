<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all(); // Gauname visas konferencijas
        return view('conferences.index', compact('conferences'));
    }

    public function show($id)
    {
        $conference = Conference::findOrFail($id); // Randa konferenciją pagal ID
        return view('conferences.show', compact('conference'));
    }

    public function create()
    {
        return view('conferences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
        ]);

        Conference::create($request->all()); // Sukuriame naują konferenciją

        return redirect()->route('conferences.index');
    }

    public function edit($id)
    {
        $conference = Conference::findOrFail($id); // Redaguoti konferenciją pagal ID
        return view('conferences.edit', compact('conference'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
        ]);

        $conference = Conference::findOrFail($id);
        $conference->update($request->all());

        return redirect()->route('conferences.index');
    }

    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);
        $conference->delete();

        return redirect()->route('conferences.index');
    }
}
