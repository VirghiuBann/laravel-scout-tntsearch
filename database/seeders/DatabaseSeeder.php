<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Models\Brand::factory(10)->create();
        Models\Category::factory(10)->create();
        Models\SubCategory::factory(10)
            ->sequence(fn ($sequence) => ['category_id' => rand(1, 10)])
            ->create();

        Models\Product::factory(50)
            ->sequence(fn ($sequence) => [
                'category_id' => rand(1, 10),
                'sub_category_id' => rand(1, 10)
            ])
            ->sequence(fn ($sequence) => ['brand_id' => rand(1, 10)])
            ->sequence(fn ($sequence) => ['status' => rand(0, 1)])
            ->create();
    }
}
