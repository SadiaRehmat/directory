<?php

namespace App\Http\Controllers;
use App\Models\Doctor;

use Illuminate\Http\Request;

class DoctorDirectoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Doctor::with(['user', 'specialization'])
            ->where('status', true);
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->whereHas('user', function ($user) use ($search) {
                    $user->where('name', 'like', "%{$search}%");
                })

                    ->orWhere('city', 'like', "%{$search}%");

            });
        }

        $doctors = $query->paginate(9);

        return view('doctor.index', compact('doctors'));
    }

    public function show(Doctor $doctor)
    {
        if (!$doctor->status) {
            abort(404);
        }

        $doctor->load([
            'user',
            'specialization',
            'reviews.patient.user',
        ]);

        return view('doctor.show', compact('doctor'));
    }
}
