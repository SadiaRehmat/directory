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
        //
    }
}
