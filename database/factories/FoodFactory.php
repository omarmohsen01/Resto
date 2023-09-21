<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name=$this->faker->word(5,true);
        return [
            'category_id'=>Category::inRandomOrder()->first()->id,
            'name'=>$name,
            'slug'=>Str::slug($name),
            'description'=>$this->faker->sentence(15),
            'small'=>$this->faker->randomFloat(1,1,499),
            'medium'=>$this->faker->randomFloat(1,1,499),
            'large'=>$this->faker->randomFloat(1,1,499),
        ];
    }
}
