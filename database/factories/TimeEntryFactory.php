<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'spent_time' => $this->faker->randomFloat(1, 0, 10),
            'notes' => $this->faker->sentence(),
        ];
    }
}
