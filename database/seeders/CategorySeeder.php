<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
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
        DB::table('categories')->insert([
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => $faker->text(),
            ],
            [
                'name' => 'Sports',
                'slug' => 'sports',
                'description' => $faker->text(),
            ],
            [
                'name' => 'Life Style',
                'slug' => 'life-style',
                'description' => $faker->text(),
            ],
            [
                'name' => 'BDSM',
                'slug' => 'bdsm',
                'description' => $faker->text(),
            ],
            [
                'name' => 'Home and Culture',
                'slug' => 'home-and-culture',
                'description' => $faker->text(),
            ]
        ]);

        // Creamos las Categorias de producto Hijas (con parent_id)

        DB::table('categories')->insert([
            [
                'parent_id' => 1,
                'name' => 'Consoles',
                'slug' => 'consoles',
                'description' => $faker->text(),
            ],
            [
                'parent_id' => 1,
                'name' => 'Computers Components',
                'slug' => 'computers-components',
                'description' => $faker->text(),
            ],
            [
                'parent_id' => 3,
                'name' => 'GYM',
                'slug' => 'gym',
                'description' => $faker->text(),
            ],
            [
                'parent_id' => 5,
                'name' => 'Books',
                'slug' => 'books',
                'description' => $faker->text(),
            ],
            [
                'parent_id' => 3,
                'name' => 'Football',
                'slug' => 'football',
                'description' => $faker->text(),
            ]
        ]);
    }
}
