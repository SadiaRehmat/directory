

    <h1>Find Doctors</h1>

    @forelse($doctors as $doctor)

        <hr>

        <h2>{{ $doctor->user->name }}</h2>

        <p>
            {{ $doctor->specialization->name }}
        </p>

        <p>
            {{ $doctor->city }}
        </p>

        <p>
            {{ $doctor->experience }} Years Experience
        </p>

        <a href="{{ route('doctors.show', $doctor) }}">
            View Profile
        </a>

    @empty

        <p>No doctors available.</p>

    @endforelse

    {{ $doctors->links() }}

