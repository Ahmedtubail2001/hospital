<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name_en' => $this->faker->unique()->randomElement(['Department of Surgery ', 'Orthopedic department', 'Operations department', 'Department of brain and nerves ', 'x_ray place ']),
            'name_ar' => $this->faker->unique()->randomElement(['قسم الجراحة ', 'قسم العظام', 'قسم العمليات', 'قسم المخ والأعصاب ', ' قسم الأشعة السينية']),
            'description_en' => $this->faker->paragraph(),
            'description_ar' => $this->faker->paragraph(),
        ];
    }
}