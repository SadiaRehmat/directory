
<div class="container">

    <h2>Appointment Requests</h2>

    @if($appointments->count() > 0)

        <div class="row">

            @foreach($appointments as $appointment)

                <div class="col-md-6 mb-3">

                    <div class="card shadow-sm">

                        <div class="card-body">

                            <h5>
                                Patient:
                                {{ $appointment->patient->user->name }}
                            </h5>

                            <p>
                                Email:
                                {{ $appointment->patient->user->email }}
                            </p>

                            <p>
                                Date:
                                {{ $appointment->appointment_date }}
                            </p>

                            <p>
                                Time:
                                {{ $appointment->appointment_time }}
                            </p>

                            <p>
                                Notes:
                                {{ $appointment->notes ?? 'No notes provided' }}
                            </p>

                            <p>
                                Status:
                                <span class="badge bg-warning text-dark">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        {{ $appointments->links() }}

    @else

        <div class="alert alert-info">
            No pending appointment requests found.
        </div>

    @endif

</div>
