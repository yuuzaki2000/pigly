<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => 1,
            'date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y/m/d'),
            'weight' => $this->faker->randomFloat(1, 65, 70),
            'calories' => $this->faker->randomFloat(1,1000,3000),
            'exercise_time' => $this->faker->time('H:i'),
            'exercise_content' => $this->faker->randomElement(['歩行', 'ランニング', '水泳']),
        ];
    }
}
