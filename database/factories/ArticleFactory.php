<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->text(100),
            "description" => $this->faker->text(1000),
            "user_id" => User::all()->random()->id,
            "category_id" => Category::all()->random()->id,
        ];
    }
}
