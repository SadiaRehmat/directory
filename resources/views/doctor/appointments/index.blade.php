@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif


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

                                @if($appointment->status === 'pending')

                                    <form action="{{ route('appointments.approve', $appointment->id) }}" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" class="btn btn-success">
                                            Approve Appointment
                                        </button>

                                    </form>
                                    <form action="{{ route('appointments.reject', $appointment->id) }}" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" class="btn btn-success">
                                            Reject Appointment
                                        </button>

                                    </form>

                                @endif
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