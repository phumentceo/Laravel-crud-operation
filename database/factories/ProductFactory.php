<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->text(15),
            "description" => $this->faker->text(70),
            "price" => $this->faker->numberBetween(200,1000),
            "qty"   => $this->faker->numberBetween(5,15),
            "created_at" => Carbon::now()->format('d-m-Y'),
            "updated_at" => Carbon::now()->format('d-m-Y'),
        ];
    }
}
