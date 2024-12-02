<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Rodome visų konferencijų sąrašą
    public function index()
    {
        // Gauti visas konferencijas (planuojamas ir įvykusias)
        $conferences = Conference::all();

        // Grąžiname į Blade šabloną su konferencijų sąrašu
        return view('employee.conferences.index', compact('conferences'));
    }

    // Rodyti konkrečią konferenciją ir užsiregistravusius klientus
    public function show($id)
    {
        // Gauti konferenciją pagal ID
        $conference = Conference::findOrFail($id);

        // Gauti užsiregistravusius vartotojus (klientus)
        $clients = $conference->users;

        // Grąžinti į Blade šabloną su klientų sąrašu
        return view('employee.conferences.show', compact('conference', 'clients'));
    }
}