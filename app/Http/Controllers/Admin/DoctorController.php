<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //
    public function index()
    {
        $doctors = Doctor::with(['user', 'specialization'])->get();

        return view('admin.doctors.index', compact('doctors'));
    }

    // Admin approves doctor
    public function approve(Doctor $doctor)
    {
        $doctor->update([
            'status' => true,
        ]);

        return redirect()->route('admin.doctors.index')
            ->with('success', 'Doctor approved successfully.');
    }

    // Show doctors to admin
    public function show(Doctor $doctor)
    {
        $doctor->load(['user', 'specialization']);

        return view('admin.doctors.show', compact('doctor'));
    }
}
