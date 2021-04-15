<?php

namespace Database\Factories;

use App\Models\PetRock;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetRockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PetRock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "bio" => $this->faker->text(),
            "size" => $this->faker->randomElement(config("constants.rock_sizes"))
        ];
    }
}
