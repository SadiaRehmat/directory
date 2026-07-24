<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // Updated
        if (!auth()->user()->doctor->status) {
            return redirect()->route('doctor.pending');
        }

        return view('doctor.dashboard');
    }
}
