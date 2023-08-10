<?php

namespace Database\Factories;

use App\Models\Models\Section;
use App\Models\Section as ModelsSection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_id' => now(),
            'password' => '$2y$10$fXv88VswVz6FmijmoRRC4u0RjbOH.X0EbO08W1D8ZYhEu8SsMVoMa',
            'phone' => $this->faker->phoneNumber(),
            'section_id' => ModelsSection::all()->random()->id,

        ];
    }
}