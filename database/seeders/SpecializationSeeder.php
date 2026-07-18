<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $specializations = [
            'Cardiologist',
            'Dermatologist',
            'Dentist',
            'Neurologist',
            'Orthopedic',
            'Pediatrician',
            'Psychiatrist',
            'Gynecologist',
            'ENT Specialist',
            'Ophthalmologist'
        ];

        foreach ($specializations as $specialization) {
            Specialization::create([
                'name' => $specialization,
            ]);
        }
    }
}
