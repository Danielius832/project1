<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Rodyti visų konferencijų sąrašą darbuotojui.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Čia gali būti loginis kodas, pvz., konferencijų iš duomenų bazės paėmimas
        $conferences = [
            ['id' => 1, 'name' => 'Tech Conference', 'date' => '2024-12-05'],
            ['id' => 2, 'name' => 'Science Summit', 'date' => '2024-12-10'],
        ];

        return view('employee.conferences', compact('conferences'));
    }
}
