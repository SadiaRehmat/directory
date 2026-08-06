
    <h1>My Appointments</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table>

        <thead>
            <tr>
                <th>Doctor</th>
                <th>Specialization</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($appointments as $appointment)

                <tr>

                    <td>{{ $appointment->doctor->user->name }}</td>

                    <td>{{ $appointment->doctor->specialization->name }}</td>

                    <td>{{ $appointment->appointment_date }}</td>

                    <td>{{ $appointment->appointment_time }}</td>

                    <td>{{ ucfirst($appointment->status) }}</td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" style="background-color: blue; padding: 10px; border-radius: 10px;">
                        No appointments found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    {{ $appointments->links() }}
