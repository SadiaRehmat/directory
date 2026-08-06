

    <div class="text-center">

        <h1 class="text-3xl font-bold">
            Choose Your Account Type
        </h1>

        <p class="mt-2 text-gray-600">
            Select how you want to use MediFind.
        </p>

    </div>

    <div class="mt-8 space-y-4">

        <a
            href="{{ route('doctor.register') }}"
            class="block w-full rounded-lg border p-6 text-center hover:bg-gray-100">

            👨‍⚕️ Register as Doctor

        </a>

        <a
            href="{{ route('patient.register') }}"
            class="block w-full rounded-lg border p-6 text-center hover:bg-gray-100">

            🧑 Register as Patient

        </a>

    </div>
