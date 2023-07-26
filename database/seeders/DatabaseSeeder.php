<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Product;
use App\Models\Brand;

use Faker\Generator as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // User::truncate();
        // Category::truncate();
        // Brand::truncate();
        // Product::truncate();
        // Post::truncate();

        //Product::factory(5)->create();
        // Post::factory(5)->create();
        // // User::factory(3)->create();
        // $user = User::factory()->create();

        // $category1 = Category::create([
        //     'name' => 'Category 1',
        //     'slug' => 'category-1'
        // ]);

        // $category2 = Category::create([
        //     'name' => 'Category 2',
        //     'slug' => 'category-2'
        // ]);

        // $category3 = Category::create([
        //     'name' => 'Category 3',
        //     'slug' => 'category-3'
        // ]);

        // Product::factory(1)->create([
        //     'user_id' => $user->id;
        // ]);
        $user = User::factory()->create([
            'name' => 'Marc adina 1',
            'username' => 'marcadina'
        ]);

        $user1 = User::factory()->create([
            'name' => 'Marc adina 2',
            'username' => 'marcadina2'
        ]);

        //$user = User::factory()->create();

        $category1 = Category::create([
            'name' => 'TV',
            'slug' => 'tv'
        ]);

        $category2 = Category::create([
            'name' => 'Electric Fan',
            'slug' => 'electric-fan'
        ]);

        $category3 = Category::create([
            'name' => 'Oven',
            'slug' => 'oven'
        ]);

        $category4 = Category::create([
            'name' => 'Lights',
            'slug' => 'lights'
        ]);

        $brand1 = Brand::create([
            'name' => 'Panasonic',
            'slug' => 'panasonic',
            'category_id' => $category1->id
        ]);

        $brand2 = Brand::create([
            'name' => 'WhirlPool',
            'slug' => 'whirlpool',
            'category_id' => $category1->id
        ]);

        $brand3 = Brand::create([
            'name' => 'Sony',
            'slug' => 'sony',
            'category_id' => $category3->id
        ]);

        $brand4 = Brand::create([
            'name' => 'Fukuda',
            'slug' => 'fukuda',
            'category_id' => $category3->id
        ]);

        $brand5 = Brand::create([
            'name' => 'OMNI',
            'slug' => 'omni',
            'category_id' => $category4->id
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $category1->id,
            'title' => 'Post 1',
            'slug' => 'post-1',
            'excerpt' => '<p>Lorem Ipsum Excerpt Here</p>',
            'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur iure perspiciatis, animi fuga recusandae et quis consectetur adipisci quas tempora laboriosam vero magni nobis cumque deleniti ab dolorum. Mollitia, blanditiis.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $category2->id,
            'title' => 'Post 2',
            'slug' => 'post-2',
            'excerpt' => '<p>Lorem Ipsum Excerpt Here</p>',
            'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur iure perspiciatis, animi fuga recusandae et quis consectetur adipisci quas tempora laboriosam vero magni nobis cumque deleniti ab dolorum. Mollitia, blanditiis.</p>'
        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $category2->id,
            'brand_id' => $brand1->id,
            'name' => 'Product Name 1',
            'slug' => 'product-name-1',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $category2->id,
            'brand_id' => $brand1->id,
            'name' => 'Product Name 2',
            'slug' => 'product-name-2',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user1->id,
            'category_id' => $category3->id,
            'brand_id' => $brand1->id,
            'name' => 'Product Name 3',
            'slug' => 'product-name-3',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $category3->id,
            'brand_id' => $brand1->id,
            'name' => 'Product Name 4',
            'slug' => 'product-name-4',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $category1->id,
            'brand_id' => $brand1->id,
            'name' => 'Product Name 5',
            'slug' => 'product-name-5',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $category4->id,
            'brand_id' => $brand5->id,
            'name' => 'Product Name 6',
            'slug' => 'product-name-6',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);




    }
}
