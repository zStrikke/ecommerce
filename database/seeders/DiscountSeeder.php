<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('discounts')->insert([
            [
                'name' => 'Christmas sales',
                'description' => $faker->text(),
                'percent' => 25,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Summer sales',
                'description' => $faker->text(),
                'percent' => 10,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Special Offer',
                'description' => $faker->text(),
                'percent' => 50,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
