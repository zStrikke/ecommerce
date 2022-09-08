<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Creamos las Categorias de producto Padre (sin parent_id).
        DB::table('product_categories')->insert([
            [
                'name' => 'Electronics',
                'description' => $faker->text(),
            ],
            [
                'name' => 'Sports',
                'description' => $faker->text(),
            ],
            [
                'name' => 'Life Style',
                'description' => $faker->text(),
            ],
            [
                'name' => 'BDSM',
                'description' => $faker->text(),
            ],
            [
                'name' => 'Home and Culture',
                'description' => $faker->text(),
            ]
        ]);

        // Creamos las Categorias de producto Hijas (con parent_id)

        DB::table('product_categories')->insert([
            [
                'parent_id' => 1,
                'name' => 'Consoles',
                'description' => $faker->text(),
            ],
            [
                'parent_id' => 1,
                'name' => 'Computers Components',
                'description' => $faker->text(),
            ],
            [
                'parent_id' => 3,
                'name' => 'GYM',
                'description' => $faker->text(),
            ],
            [
                'parent_id' => 5,
                'name' => 'Books',
                'description' => $faker->text(),
            ],
            [
                'parent_id' => 3,
                'name' => 'Football',
                'description' => $faker->text(),
            ]
        ]);
    }
}
