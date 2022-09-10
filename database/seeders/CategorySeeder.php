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
                'slug' => 'lectronics',
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Sports',
                'slug' => 'sports',
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Life Style',
                'slug' => 'life-style',
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'BDSM',
                'slug' => 'bdsm',
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'name' => 'Home and Culture',
                'slug' => 'home-and-culture',
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ]
        ]);

        // Creamos las Categorias de producto Hijas (con parent_id)

        DB::table('categories')->insert([
            [
                'parent_id' => 1,
                'name' => 'Consoles',
                'slug' => 'consoles',
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'parent_id' => 1,
                'name' => 'Computers Components',
                'slug' => 'computers-components',
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'parent_id' => 3,
                'name' => 'GYM',
                'slug' => 'gym',
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'parent_id' => 5,
                'name' => 'Books',
                'slug' => 'books',
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ],
            [
                'parent_id' => 3,
                'name' => 'Football',
                'slug' => 'football',
                'description' => $faker->text(),
                'created_at' => $faker->dateTimeBetween('2021-01-01', '2021-12-31'),
                'updated_at' => now()
            ]
        ]);
    }
}
