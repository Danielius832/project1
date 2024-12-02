<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    // Rodyti konferencijų sąrašą
    public function index()
    {
        // Gauti visas konferencijas
        $conferences = Conference::all();

        // Grąžinti konferencijų sąrašą į Blade šabloną
        return view('client.conferences', compact('conferences'));
    }

    // Rodyti registracijos formą
    public function showRegistrationForm($conference_id)
    {
        // Gauti konferenciją pagal ID
        $conference = Conference::findOrFail($conference_id);

        // Grąžinti registracijos formą su konferencijos duomenimis
        return view('client.register', compact('conference'));
    }

    // Registruoti vartotoją į pasirinktą konferenciją
    public function register($conferenceId)
{
    // Patikrinti, ar vartotojas yra prisijungęs
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Norėdami užsiregistruoti, turite prisijungti.');
    }

    // Patikrinti, ar vartotojas jau užsiregistravo į šią konferenciją
    if ($user->conferences()->where('conference_id', $conferenceId)->exists()) {
        return redirect()->route('client.conferences')->with('error', 'Jūs jau esate užsiregistravę į šią konferenciją.');
    }

    // Užregistruoti vartotoją į konferenciją
    $user->conferences()->attach($conferenceId);

    // Grąžinti į konferencijų sąrašą su sėkmės pranešimu
    return redirect()->route('client.conferences')->with('success', 'Sėkmingai užsiregistravote į konferenciją!');
}

}