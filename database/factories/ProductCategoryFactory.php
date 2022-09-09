<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->text(),
        ];
    }

    public function sub_categories()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => Category::get()->random(),
            ];
        });
    }
}
