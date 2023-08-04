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
        ]);

        $whirlpool = Brand::create([
            'name' => 'WhirlPool',
            'slug' => 'whirlpool',
        ]);

        $sony = Brand::create([
            'name' => 'Sony',
            'slug' => 'sony',
        ]);

        $fukuda = Brand::create([
            'name' => 'Fukuda',
            'slug' => 'fukuda',
        ]);

        $omni = Brand::create([
            'name' => 'OMNI',
            'slug' => 'omni',
        ]);

        $kyowa = Brand::create([
            'name' => 'Kyowa',
            'slug' => 'kyowa',
        ]);




        //Reviews::factory(5)->create();


    }
}
