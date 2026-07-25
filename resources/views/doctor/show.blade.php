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

    Rating:
    {{ $review->rating }}/5

    <br>

    {{ $review->review }}

    <hr>

@empty

    <p>No reviews yet.</p>

@endforelse


<button disabled>
    Book Appointment
</button>