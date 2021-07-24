<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Todo\Models\Todo;

class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item' => $this->faker->text(15)
        ];
    }
}
