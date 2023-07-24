<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use Spatie\YamlFrontMatter\YamlFrontMatter;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // \Illuminate\Support\Facades\DB::listen(function ($query) {
    //     logger($query->sql, $query->bindings);
    // });
    //install composer require itsgoingd/clockwork

    // return view('posts', [
    //     'posts' => Post::all()
    // ]);
        return view('posts', [
            // 'posts' => Post::with('category')->get()

            'posts' => Post::latest('published_at')->with('category')->get()
        ]);
});

Route::get('/posts', function () {

    return view('posts', [
        'posts' => Post::all()
    ]);

});

// Route::get('/posts/{post}', function ($slug) {

//     return view('post', [
//         'post' => Post::find($slug)
//     ]);

// })->where('post', '[A-z_\-]+');

// Route::get('/posts/{post}', function ($slug) {

//     return view('post', [
//         'post' => Post::findorFail($slug)
//     ]);
// });


// Route::get('/posts/{post}', function ($id) {

//     return view('post', [
//         'post' => Post::findorFail($id)
//     ]);
// });

// Route::get('/posts/{post}', function (Post $post) {

//     return view('post', [
//         'post' => $post
//     ]);
// });

Route::get('posts/{post:slug}', function (Post $post) { // wrap model binding

    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {

    // return view('posts', [
    //     'posts' => $category->posts
    // ]);

    return view('products', [
        'products' => $category->products
        // 'posts' => $category->posts
    ]);

});

Route::get('products', function () {

    return view('products', [
        // 'products' => Product::all()
        'products' => Product::latest('published_at')->get()
    ]);

});

Route::get('products/{product:slug}', function (Product $product) { // wrap model binding

    return view('product', [
        'product' => $product
    ]);
});


Route::get('authors/{author:username}', function (User $author) { // wrap model binding

    return view('products', [
        'products' => $author->products
    ]);
});
