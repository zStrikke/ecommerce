<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'content' => $this->faker->text(),
            'rating' => $this->faker->numberBetween(0, 10),
            'is_public' => 1,
            'is_buy_verified' => rand(0,1),
            // 'parent_id' => rand(0,1) ? Review::get()->random() : null,
            'user_id' => User::get()->random(),
            'product_id' => Product::get()->random(),
            'updated_at' => $this->faker->dateTimeBetween('2021-01-01', '2021-12-31'),
            'created_at' => $this->faker->dateTimeBetween('2021-01-01', '2021-12-31')
        ];
    }

    public function with_parent()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => null,
                'parent_id' => Review::get()->random(),
            ];
        });
    }
}
