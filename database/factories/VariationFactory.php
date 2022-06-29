<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variation>
 */
class VariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id'=>$this->faker->numberBetween(1,344),
            'name'=>$this->faker->name,
            'price'=>$this->faker->numberBetween(400,20000),
            'type'=>$this->faker->text,
            'sku'=>$this->faker->numberBetween(1111,20000),
            'parent_id'=>null,
            'order'=>1,
        ];
    }
}
