<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 1000),
            'body' => $this->faker->sentence(20),
            'created_at' => $this->faker->dateTimeBetween('-5 years', now(), config('app.timezone')),
        ];
    }
}
