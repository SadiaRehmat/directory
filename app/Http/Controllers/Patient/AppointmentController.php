<?php

namespace App\Http\Controllers\Patient;
use App\Models\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //

    public function create(Doctor $doctor)
{
    return view('appointments.create', compact('doctor'));
}
}
