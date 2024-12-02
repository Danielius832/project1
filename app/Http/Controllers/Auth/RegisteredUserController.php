<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    // Registracijos formos rodymas
    public function create()
    {
        return view('auth.register');
    }

    // Registracijos duomenų apdorojimas
    public function store(Request $request)
    {
        // Validacija
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Naujo vartotojo sukūrimas
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Nukreipti į prisijungimo puslapį su sėkmės pranešimu
        return redirect()->route('login')->with('success', 'Registracija sėkminga! Prašome prisijungti.');
    }
}
