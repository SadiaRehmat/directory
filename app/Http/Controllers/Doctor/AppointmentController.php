<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with([
            'patient.user'
        ])
            ->whereHas('doctor', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('doctor.appointments.index', compact('appointments'));
    }

    public function approve($id)
    {
        $appointment = Appointment::whereHas('doctor', function ($query) {
            $query->where('user_id', auth()->id());
        })->findOrFail($id);

        if($appointment->status !== 'pending'){
            return back()->with('error', 'This appointment cannot be approved!!');
        }

        $appointment->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'Appointment approved successfully🎉!!');
    }
}