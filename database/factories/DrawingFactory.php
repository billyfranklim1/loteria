<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Drawing;

class DrawingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'date_start' => $this->faker->date(),
            'date_end' => $this->faker->date(),
            'status' => 1,
        ];
    }
}
