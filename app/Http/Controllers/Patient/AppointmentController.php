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



    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string|max:1000',
        ]);

        $patient = auth()->user()->patient;

        // Check if the selected time slot is already booked
        $appointmentExists = Appointment::where('doctor_id', $validated['doctor_id'])
            ->where('appointment_date', $validated['appointment_date'])
            ->where('appointment_time', $validated['appointment_time'])
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($appointmentExists) {
            return back()
                ->withErrors([
                    'appointment_time' => 'This time slot is already booked.'
                ])
                ->withInput();
        }

        Appointment::create([
            'doctor_id' => $validated['doctor_id'],
            'patient_id' => $patient->id,
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'notes' => $validated['notes'],
        ]);

        return redirect()
            ->route('patient.appointments.index')
            ->with('success', 'Appointment booked successfully.');
    }
}
