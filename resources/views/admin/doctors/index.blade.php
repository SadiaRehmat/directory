<h2>Doctors</h2>

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
            <td>
                @if($doctor->status == 'pending')
                    <span style="color:orange;">Pending</span>
                @elseif($doctor->status == 'approved')
                    <span style="color:green;">Approved</span>
                @else
                    <span style="color:red;">Rejected</span>
                @endif
            </td>
        </tr>
    @empty

        <tr>
            <td colspan="8">
                No doctors found.
            </td>
        </tr>

    @endforelse

</table>