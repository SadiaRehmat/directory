<h2>Doctors</h2>
@if(session('success'))
    <div style="color: green; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

<table border="1">

    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Specialization</th>
        <th>Experience</th>
        <th>Consultation_fee</th>
        <th>City</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @forelse($doctors as $doctor)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $doctor->user->name }}</td>
            <td>{{ $doctor->user->email }}</td>
            <td>{{ $doctor->specialization->name }}</td>
            <td>{{ $doctor->experience }}</td>
            <td>{{ $doctor->consultation_fee }}</td>
            <td>{{ $doctor->city }}</td>
            <td>{{ ucfirst($doctor->status) }}</td>
            <td><a href="#">Pending</a><a href="#">
                    <form action="{{ route('admin.doctors.approve', $doctor) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')

                        <button type="submit">
                            Approve
                        </button>
                    </form>
                </a><a href="#">Rejected</a></td>
        </tr>
    @empty

        <tr>
            <td colspan="8">
                No doctors found.
            </td>
        </tr>

    @endforelse

</table>