<x-guest-layout>
    <h1 class="text-2xl font-bold">Doctor Registration</h1>
    <form method="POST" action="{{ route('doctor.register.store') }}">
        @csrf
        <div class="mt-4">
            <x-input-label for="name" :value="__('Full Name')" />

            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="specialization_id" :value="__('Specialization')" />

            <select id="specialization_id" name="specialization_id"
                class="block mt-1 w-full rounded-md border-gray-300">
                <option value="">Select Specialization</option>
                <option value="1">Cardiologist</option>
                <option value="2">Dermatologist</option>
                <option value="3">Dentist</option>
            </select>

            <x-input-error :messages="$errors->get('specialization_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="qualification" :value="__('Qualification')" />

            <x-text-input id="qualification" class="block mt-1 w-full" type="text" name="qualification"
                :value="old('qualification')" required />

            <x-input-error :messages="$errors->get('qualification')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="experience" :value="__('Experience (Years)')" />

            <x-text-input id="experience" class="block mt-1 w-full" type="number" name="experience"
                :value="old('experience')" required />

            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="consultation_fee" :value="__('Consultation Fee')" />

            <x-text-input id="consultation_fee" class="block mt-1 w-full" type="number" step="0.01"
                name="consultation_fee" :value="old('consultation_fee')" required />

            <x-input-error :messages="$errors->get('consultation_fee')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />

            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                required />

            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />

            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />

            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />

            <textarea id="address" name="address" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm"
                rows="3">{{ old('address') }}</textarea>

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="about" :value="__('About')" />

            <textarea id="about" name="about" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm"
                rows="5">{{ old('about') }}</textarea>

            <x-input-error :messages="$errors->get('about')" class="mt-2" />
        </div>
        <x-primary-button class="mt-1">
            Register as Doctor
        </x-primary-button>
    </form>
</x-guest-layout>