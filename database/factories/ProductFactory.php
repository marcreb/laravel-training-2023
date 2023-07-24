<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\Product;
use App\Models\User;

use App\Models\Brand;
use App\Models\Category;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'brand_id' => Brand::factory()->create()->id,
            'category_id' => Category::factory()->create()->id,
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'price' => $this->faker->numberBetween($min = 1500, $max = 6000),
            'image' => $this->faker->image('public/storage/images', 640, 480, null, false)
        ];
    }
}
