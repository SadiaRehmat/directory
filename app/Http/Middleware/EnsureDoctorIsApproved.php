<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureDoctorIsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $doctor = auth()->user()->doctor;

        if (!$doctor->status) {
            return redirect()->route('doctor.pending');
        }

        return $next($request);
    }
}
