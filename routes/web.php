<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [ProductController::class, 'index'])->name('home');

// request()->routeIs('home') -> check if the page is home

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

// Route::get('/product-category/{category:slug}', function (Category $category) {

//     // return view('posts', [
//     //     'posts' => $category->posts
//     // ]);

//     return view('products.index', [
//         'products' => $category->products,
//         // 'currentCategory' => $category,
//         'brands' => Brand::all()
//     ]);

// });

Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('product-category/{category:slug}', [ProductController::class, 'index'])->name('product-category');

// Route::get('products', function () {

//     return view('products', [
//         // 'products' => Product::all()
//         'products' => Product::latest('published_at')->get(),
//         'brands' => Brand::all()
//     ]);

// });

// Route::get('products/{product:slug}', function (Product $product) { // wrap model binding

//     return view('product', [
//         'product' => $product
//     ]);
// });

Route::get('product/{product:slug}', [ProductController::class, 'show']);


Route::get('authors/{author:username}', function (User $author) { // wrap model binding

    return view('products.index', [
        'products' => $author->products,
        'brands' => Brand::all()
    ]);
});

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);
