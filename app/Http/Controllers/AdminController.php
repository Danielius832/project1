<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Konferencijų sąrašas
    public function index()
    {
        $conferences = Conference::all();
        return view('admin.conferences.index', compact('conferences'));
    }

    // Konferencijos kūrimo forma
    public function create()
    {
        return view('admin.conferences.create');
    }

    // Sukurti konferenciją
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Conference::create([
            'name' => $request->name,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija sukurta!');
    }

    // Konferencijos redagavimo forma
    public function edit($id)
    {
        $conference = Conference::findOrFail($id);
        return view('admin.conferences.edit', compact('conference'));
    }

    // Atnaujinti konferenciją
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $conference = Conference::findOrFail($id);
        $conference->update([
            'name' => $request->name,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija atnaujinta!');
    }

    // Šalinti konferenciją
    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);
        $conference->delete();

        return redirect()->route('admin.conferences.index')->with('success', 'Konferencija ištrinta!');
    }
}
