<?php

namespace App\Http\Controllers\Patient;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AppointmentController extends Controller
{
    //

    public function create(Doctor $doctor)
{
    return view('appointments.create', compact('doctor'));
}


}
