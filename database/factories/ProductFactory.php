<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->sentence(),
            'slug' => Str::slug($name),
            'model' => $this->faker->randomNumber(5, true),
            'brand_id' => 1,
            'sub_category_id' => 1,
            'category_id' => 1,
            'status' => true
        ];
    }
}
