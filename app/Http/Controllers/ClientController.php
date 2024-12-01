<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        // Atvaizduoti konferencijų sąrašą
        return view('client.conferences');
    }

    public function show($id) {
        // Atvaizduoti konkrečią konferenciją
        return view('client.conference', compact('id'));
    }

    public function register($id) {
        // Registruoti klientą į konferenciją
        return redirect()->route('client.conferences');
    }
}
