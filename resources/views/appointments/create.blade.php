<h1>Booking View</h1>


    <div class="max-w-2xl mx-auto py-10">

        <h1 class="text-2xl font-bold mb-6">
            Book Appointment
        </h1>

        <div class="mb-6">
            <h2 class="text-lg font-semibold">
                Dr. {{ $doctor->user->name }}
            </h2>

            <p class="text-gray-600">
                {{ $doctor->specialization->name }}
            </p>
        </div>

        <form method="POST" action="{{ route('appointments.store') }}">

            @csrf

            <!-- Doctor -->
            <input
                type="hidden"
                name="doctor_id"
                value="{{ $doctor->id }}"
            >

            <!-- Date -->
            <div class="mb-4">
                <label class="block font-medium mb-2">
                    Appointment Date
                </label>

                <input
                    type="date"
                    name="appointment_date"
                    value="{{ old('appointment_date') }}"
                    min="{{ date('Y-m-d') }}"
                    required
                    class="w-full border rounded p-2"
                >

                @error('appointment_date')
                    <p class="text-red-600 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Time -->
            <div class="mb-4">
                <label class="block font-medium mb-2">
                    Appointment Time
                </label>

                <input
                    type="time"
                    name="appointment_time"
                    value="{{ old('appointment_time') }}"
                    required
                    class="w-full border rounded p-2"
                >

                @error('appointment_time')
                    <p class="text-red-600 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Notes -->
            <div class="mb-6">
                <label class="block font-medium mb-2">
                    Notes
                </label>

                <textarea
                    name="notes"
                    rows="4"
                    class="w-full border rounded p-2"
                    placeholder="Describe your reason for appointment..."
                >{{ old('notes') }}</textarea>

                @error('notes')
                    <p class="text-red-600 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button
                type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded"
            >
                Book Appointment
            </button>

        </form>

    </div>
