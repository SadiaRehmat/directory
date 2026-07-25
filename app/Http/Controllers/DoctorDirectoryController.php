<?php

namespace App\Http\Controllers;
use App\Models\Doctor;

use Illuminate\Http\Request;

class DoctorDirectoryController extends Controller
{
    //
    public function index()
{
    $doctors = Doctor::with(['user', 'specialization'])
        ->where('status', true)
        ->paginate(9);

    return view('doctor.index', compact('doctors'));
}
}
