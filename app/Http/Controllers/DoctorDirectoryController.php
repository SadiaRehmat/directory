<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;

class DoctorDirectoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $specializations = Specialization::all();
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
        if ($request->filled('specialization')) {
            $query->where(
                'specialization_id',
                $request->specialization
            );
        }

        $doctors = $query->paginate(9);

        return view('doctor.index', compact('doctors', 'specializations'));
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
