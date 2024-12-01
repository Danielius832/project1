<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Parodyti pagrindinį administratoriaus puslapį.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Galima pridėti duomenų perdavimo logiką
        $data = [
            'totalUsers' => 50,
            'totalConferences' => 10,
        ];

        return view('admin.dashboard', compact('data'));
    }
}
