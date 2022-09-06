<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
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
            'desc' => $this->faker->text(),
        ];
    }

    public function sub_categories()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => ProductCategory::get()->random(),
            ];
        });
    }
}
