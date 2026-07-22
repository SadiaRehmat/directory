<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $totalDoctors = Doctor::count();

        $pendingDoctors = Doctor::where('status', 'pending')->count();

        $approvedDoctors = Doctor::where('status', 'approved')->count();

        $patients = Patient::count();

        $appointments = Appointment::count();

        return view('admin.dashboard', compact(
            'totalDoctors',
            'pendingDoctors',
            'approvedDoctors',
            'patients',
            'appointments'
        ));
    }
}
