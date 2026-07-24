<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Specialization;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorRegistrationController extends Controller
{
    //
    public function create()
    {
        $specializations = Specialization::all(); //Eloquent query
        // return the whole table data as array to view 
        return view('auth.doctor-register', compact('specializations'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            // User Table
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],

            // Doctor Table
            'specialization_id' => ['required', 'exists:specializations,id'],
            'qualification' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'integer', 'min:0'],
            'consultation_fee' => ['required', 'numeric', 'min:0'],
            'phone' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'about' => ['required', 'string'],

        ]);


        //  It will either save data in both tables or do nothing
       return DB::transaction(function () use ($validated) {

            // Create User
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'doctor',
            ]);

            // Create Doctor
            Doctor::create([
                'user_id' => $user->id,
                'specialization_id' => $validated['specialization_id'],
                'qualification' => $validated['qualification'],
                'experience' => $validated['experience'],
                'consultation_fee' => $validated['consultation_fee'],
                'phone' => $validated['phone'],
                'city' => $validated['city'],
                'address' => $validated['address'],
                'about' => $validated['about'],
            ]);
            event(new Registered($user));
            Auth::login($user);
            return redirect()->route('doctor.dashboard');

        });

    }
}
