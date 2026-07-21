<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorRegistrationController extends Controller
{
    //
    public function create()
    {
        return view('auth.doctor-register');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            // User Table
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],

            // Doctor Table
            'specialization_id' => ['required', 'exists:specializations,id'],
            'qualification' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'integer', 'min:0'],
            'consultation_fee' => ['required', 'numeric', 'min:0'],
            'phone' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'about' => ['required', 'string'],

        ]);

        dd($validated);
    }
}
