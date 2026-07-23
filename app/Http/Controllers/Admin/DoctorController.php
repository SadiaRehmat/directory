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
    public function approve(Doctor $doctor)
    {
        $doctor->update([
            'status' => true,
        ]);

        return redirect()->route('admin.doctors.index')
            ->with('success', 'Doctor approved successfully.');
    }
}
