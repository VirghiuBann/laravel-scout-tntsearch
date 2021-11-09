<?php

namespace Database\Factories;

use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    protected $model = SubCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->name(),
            'slug' => Str::slug($name),
        ];
    }
}
