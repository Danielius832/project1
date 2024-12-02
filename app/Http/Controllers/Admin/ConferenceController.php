<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    /**
     * Rodyti visų konferencijų sąrašą.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $conferences = Conference::all(); // Rodyti visas konferencijas
        return view('admin.conferences.index', compact('conferences'));
    }

    /**
     * Rodyti formą konferencijos kūrimui.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.conferences.create');
    }

    /**
     * Išsaugoti naują konferenciją.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Conference::create($validated);

        return redirect()->route('admin.conferences.index'); // Nukreipia į konferencijų sąrašą
    }

    /**
     * Rodyti konkrečią konferenciją.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\View\View
     */
    public function show(Conference $conference)
    {
        return view('admin.conferences.show', compact('conference'));
    }

    /**
     * Redaguoti konferenciją.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\View\View
     */
    public function edit(Conference $conference)
    {
        return view('admin.conferences.edit', compact('conference'));
    }

    /**
     * Atnaujinti konferenciją.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Conference $conference)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $conference->update($validated);

        return redirect()->route('admin.conferences.index'); // Nukreipia atgal į sąrašą
    }

    /**
     * Ištrinti konferenciją.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Conference $conference)
    {
        $conference->delete();

        return redirect()->route('admin.conferences.index'); // Nukreipia atgal į sąrašą
    }
}
