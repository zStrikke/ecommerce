<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO: refactorizar a un bucle.
        $faker = \Faker\Factory::create();

        DB::table('products')->insert([
            [
                'name' => 'Producto #1',
                'slug' => 'producto-1',
                'sku' => $faker->uuid(),
                'price' => $faker->randomNumber(2),
                'is_onsale' => 1,
                'is_public' => 1,
                'category_id' => 6, // Consoles
                'discount_id' => null,
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Producto #2',
                'slug' => 'producto-2',
                'sku' => $faker->uuid(),
                'price' => $faker->randomNumber(2),
                'is_onsale' => 1,
                'is_public' => 1,
                'category_id' => 6, // Consoles
                'discount_id' => 3,
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Producto #3',
                'slug' => 'producto-3',
                'sku' => $faker->uuid(),
                'price' => $faker->randomNumber(2),
                'is_onsale' => 1,
                'is_public' => 1,
                'category_id' => 6, // Consoles
                'discount_id' => null,
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Producto #4',
                'slug' => 'product-4',
                'sku' => $faker->uuid(),
                'price' => $faker->randomNumber(2),
                'is_onsale' => 1,
                'is_public' => 1,
                'category_id' => 6, // Consoles
                'discount_id' => null,
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Producto #5',
                'slug' => 'producto-5',
                'sku' => $faker->uuid(),
                'price' => $faker->randomNumber(2),
                'is_onsale' => 1,
                'is_public' => 1,
                'category_id' => 6, // Consoles
                'discount_id' => 2,
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Producto #6',
                'slug' => 'producto-6',
                'sku' => $faker->uuid(),
                'price' => $faker->randomNumber(2),
                'is_onsale' => 1,
                'is_public' => 1,
                'category_id' => 6, // Consoles
                'discount_id' => 1,
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Producto #7',
                'slug' => 'producto-7',
                'sku' => $faker->uuid(),
                'price' => $faker->randomNumber(2),
                'is_onsale' => 1,
                'is_public' => 1,
                'category_id' => 6, // Consoles
                'discount_id' => null,
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Producto #8',
                'slug' => 'producto-8',
                'sku' => $faker->uuid(),
                'price' => $faker->randomNumber(2),
                'is_onsale' => 1,
                'is_public' => 1,
                'category_id' => 6, // Consoles
                'discount_id' => null,
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Producto #9',
                'slug' => 'producto-9',
                'sku' => $faker->uuid(),
                'price' => $faker->randomNumber(2),
                'is_onsale' => 0,
                'is_public' => 1,
                'category_id' => 6, // Consoles
                'discount_id' => 3,
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Producto #10',
                'slug' => 'producto-10',
                'sku' => $faker->uuid(),
                'price' => $faker->randomNumber(2),
                'is_onsale' => 0,
                'is_public' => 1,
                'category_id' => 6, // Consoles
                'discount_id' => null,
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ]
        ]);
    }
}
