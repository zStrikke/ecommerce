<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address_line1' => $this->faker->streetAddress() . $this->faker->secondaryAddress(),
            'address_line2' => rand(0,1) ? $this->faker->streetAddress() . $this->faker->secondaryAddress() : '',
            'city'=> $this->faker->city,
            'country' => $this->faker->country(),
            'phone' => $this->faker->phoneNumber(),
            'postal_code' => $this->faker->postcode(),
            'updated_at' => now(),
            'created_at' => $this->faker->dateTimeBetween('2021-01-01', '2021-12-31')
        ];
    }
}
