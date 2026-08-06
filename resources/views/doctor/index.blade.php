<form action="{{ route('doctors.index') }}" method="GET">

    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by doctor or city">






    <select name="specialization">

        <option value="">
            All Specializations
        </option>

        @foreach($specializations as $specialization)

            <option value="{{ $specialization->id }}" @selected(request('specialization') == $specialization->id)>

                {{ $specialization->name }}

            </option>

        @endforeach

    </select>

    <button type="submit">
        Search
    </button>

</form>
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

    <p style="background-color: red;">No doctors available.</p>

@endforelse
{{ $doctors->withQueryString()->links() }}