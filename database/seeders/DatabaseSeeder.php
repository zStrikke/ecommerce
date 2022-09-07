<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        //\App\Models\ProductCategory::factory(4)->create();
        // $this->call([
        //     ProductCategorySeeder::class,
        // ]);
    }
}
