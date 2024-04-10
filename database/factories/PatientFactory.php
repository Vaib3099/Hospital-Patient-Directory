<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_name' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 90),
            'phone_number' => $this->faker->unique()->e164PhoneNumber, 
            'hospital_id' => Hospital::get()->random()->id,
            'photo' => null, 
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
