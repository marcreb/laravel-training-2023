<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Review;

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

        // Product::factory(5)->create();
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
            'username' => 'marcadina',
            'user_role' => 'customer'
        ]);

        $user1 = User::factory()->create([
            'name' => 'Marc adina 2',
            'username' => 'marcadina2',
            'user_role' => 'customer'
        ]);

         User::factory()->create([
            'name' => 'Marc Reb Adina',
            'username' => 'marcrebadina',
            'user_role' => 'superadmin',
            'email' => 'marcrebadina@gmail.com',
            'password' => 'admin2468'
        ]);

        //$user = User::factory()->create();

        $tv = Category::create([
            'name' => 'TV',
            'slug' => 'tv'
        ]);

        $fan = Category::create([
            'name' => 'Electric Fan',
            'slug' => 'electric-fan'
        ]);

        $oven = Category::create([
            'name' => 'Oven',
            'slug' => 'oven'
        ]);

        $light = Category::create([
            'name' => 'Lights',
            'slug' => 'lights'
        ]);

        $panasonic = Brand::create([
            'name' => 'Panasonic',
            'slug' => 'panasonic',
            'category_id' => $tv->id
        ]);

        $whirlpool = Brand::create([
            'name' => 'WhirlPool',
            'slug' => 'whirlpool',
            'category_id' => $fan->id
        ]);

        $sony = Brand::create([
            'name' => 'Sony',
            'slug' => 'sony',
            'category_id' => $tv->id
        ]);

        $fukuda = Brand::create([
            'name' => 'Fukuda',
            'slug' => 'fukuda',
            'category_id' => $fan->id
        ]);

        $omni = Brand::create([
            'name' => 'OMNI',
            'slug' => 'omni',
            'category_id' => $light->id
        ]);

        $kyowa = Brand::create([
            'name' => 'Kyowa',
            'slug' => 'kyowa',
            'category_id' => $oven->id
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $tv->id,
            'title' => 'Post 1',
            'slug' => 'post-1',
            'excerpt' => '<p>Lorem Ipsum Excerpt Here</p>',
            'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur iure perspiciatis, animi fuga recusandae et quis consectetur adipisci quas tempora laboriosam vero magni nobis cumque deleniti ab dolorum. Mollitia, blanditiis.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $tv->id,
            'title' => 'Post 2',
            'slug' => 'post-2',
            'excerpt' => '<p>Lorem Ipsum Excerpt Here</p>',
            'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur iure perspiciatis, animi fuga recusandae et quis consectetur adipisci quas tempora laboriosam vero magni nobis cumque deleniti ab dolorum. Mollitia, blanditiis.</p>'
        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $tv->id,
            'brand_id' => $sony->id,
            'name' => 'Product Name TV 1',
            'slug' => 'product-name-tv-1',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $oven->id,
            'brand_id' => $kyowa->id,
            'name' => 'Product Name Oven 2',
            'slug' => 'product-name-oven-2',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user1->id,
            'category_id' => $light->id,
            'brand_id' => $omni->id,
            'name' => 'Product Name light 3',
            'slug' => 'product-name-light-3',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $light->id,
            'brand_id' => $fukuda->id,
            'name' => 'Product Name light 4',
            'slug' => 'product-name-4',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $fan->id,
            'brand_id' => $whirlpool->id,
            'name' => 'Product Name Fan 5',
            'slug' => 'product-name-fan-5',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $tv->id,
            'brand_id' => $panasonic->id,
            'name' => 'Product Name TV 6',
            'slug' => 'product-name-tv-6',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $tv->id,
            'brand_id' => $sony->id,
            'name' => 'Product Name TV 7',
            'slug' => 'product-name-tv-7',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $tv->id,
            'brand_id' => $panasonic->id,
            'name' => 'Product Name TV 8',
            'slug' => 'product-name-tv-8',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $tv->id,
            'brand_id' => $panasonic->id,
            'name' => 'Product Name TV 9',
            'slug' => 'product-name-tv-9',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Product::create([
            'user_id' => $user->id,
            'category_id' => $tv->id,
            'brand_id' => $sony->id,
            'name' => 'Product Name TV 10',
            'slug' => 'product-name-tv-10',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        $product1 = Product::create([
            'user_id' => $user->id,
            'category_id' => $tv->id,
            'brand_id' => $panasonic->id,
            'name' => 'Product Name TV 11',
            'slug' => 'product-name-tv-11',
            'published_at' => Carbon::now(),
            'price' => $faker->numberBetween($min = 1500, $max = 6000),
            'image' => $faker->image('public/storage/images', 640, 480, null, false)

        ]);

        Review::create([
            'user_id' => $user->id,
            'product_id' => $product1->id,
            'body' => $faker->paragraph(),
        ]);

        Review::create([
            'user_id' => $user->id,
            'product_id' => $product1->id,
            'body' => $faker->paragraph(),
        ]);

        //Reviews::factory(5)->create();


    }
}
