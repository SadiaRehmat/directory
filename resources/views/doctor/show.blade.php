<h2>Doctor Detail</h2>

{{ $doctor->user->name }}
<br>
{{ $doctor->specialization->name }}
<br>
{{ $doctor->qualification }}
<br>
{{ $doctor->experience }}
<br>
{{ $doctor->consultation_fee }}
<br>
{{ $doctor->phone }}
<br>
{{ $doctor->city }}
<br>
{{ $doctor->address }}
<br>
{{ $doctor->about }}
<br>

<h3>Patient Reviews</h3>

@forelse($doctor->reviews as $review)

    <strong>{{ $review->patient->user->name }}</strong>

    <b>Rating:</b>
    {{ $review->rating }}/5

    <br>

    {{ $review->review }}

    <hr>

@empty

    <p style="background-color: skyblue; padding: 10px; border-radius: 10px;">No reviews yet.</p>

@endforelse

<a href="{{ route('appointments.create', $doctor) }}">
    Book Appointment Now
</a>