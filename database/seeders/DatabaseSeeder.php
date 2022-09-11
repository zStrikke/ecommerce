<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\UserAddressesFactory;
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
        // https://laravel.com/docs/8.x/database-testing#has-many-relationships
        \App\Models\User::factory(100)->has(\App\Models\UserAddress::factory(), 'user_addresses')->create();
        $this->call([
            DiscountSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
        \App\Models\Review::factory(7)->create();
        \App\Models\Review::factory(3)->with_parent()->create();
    }
}
