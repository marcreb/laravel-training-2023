<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResolveController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardBrandController;
use App\Http\Controllers\ProductReviewsController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'index'])->name('home');

// Route::get('products', [PageController::class, 'index'])->name('products');
Route::get('product/{product:slug}', [ProductController::class, 'show']);
Route::post('product/{product:slug}/reviews', [ProductReviewsController::class, 'store']);

Route::get('product-category/{category:slug}', [ProductController::class, 'index'])->name('product-category');


Route::get('authors/{author:username}', [ProductController::class, 'authorProducts'])->name('author-products');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('admin');

Route::post('dashboard/products', [ProductController::class, 'store'])->middleware('admin');
Route::get('dashboard/products', [DashboardProductController::class, 'index'])->middleware('admin')->name('dashboard.products');
Route::get('dashboard/products/create', [ProductController::class, 'create'])->middleware('admin');
Route::get('dashboard/product/{product}/edit', [ProductController::class, 'edit'])->middleware('admin')->name('dashboard.product.edit');


Route::get('dashboard/products/create/check_slug', [ProductController::class, 'check_slug'])->middleware('admin')->name('dashboard.products.check_slug');

Route::post('/getBrands', [ProductController::class, 'getBrands']);

Route::get('dashboard/brands', [DashboardBrandController::class, 'index'])->middleware('admin')->name('dashboard.brands');
Route::get('dashboard/brands/create', [DashboardBrandController::class, 'create'])->middleware('admin')->name('dashboard.brands.create');
Route::post('dashboard/brands/create', [DashboardBrandController::class, 'store'])->middleware('admin');
Route::get('dashboard/brand/create/check_slug', [DashboardBrandController::class, 'check_slug'])->middleware('admin')->name('dashboard.brands.check_slug');

Route::get('dashboard/brand/{brand}/edit', [DashboardBrandController::class, 'edit'])->middleware('admin');


Route::get('dashboard/categories', [DashboardCategoryController::class, 'index'])->middleware('admin')->name('dashboard.categories');
Route::get('dashboard/categories/create', [DashboardCategoryController::class, 'create'])->middleware('admin')->name('dashboard.categories.create');
Route::post('dashboard/categories/create', [DashboardCategoryController::class, 'store'])->middleware('admin');
Route::get('dashboard/categories/create/check_slug', [DashboardCategoryController::class, 'check_slug'])->middleware('admin')->name('dashboard.categories.check_slug');
Route::get('dashboard/category/{category}/edit', [DashboardCategoryController::class, 'edit'])->middleware('admin')->name('dashboard.category.edit');
Route::patch('dashboard/category/{category}', [DashboardCategoryController::class, 'update'])->middleware('admin');


Route::get('dashboard/users', [DashboardUserController::class, 'index'])->middleware('admin')->name('dashboard.users');
Route::get('dashboard/users/create', [DashboardUserController::class, 'create'])->middleware('admin')->name('dashboard.users.create');
Route::post('dashboard/users/create', [DashboardUserController::class, 'store'])->middleware('admin');
Route::get('dashboard/user/{user}/edit', [DashboardUserController::class, 'edit'])->middleware('admin');



// Route::get('dashboard-assets/{asset}', [DashboardController::class, 'serve'])->where('asset', '(.*)');

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


// request()->routeIs('home') -> check if the page is home
// Route::get('/posts', function () {

//     return view('posts', [
//         'posts' => Post::all()
//     ]);

// });

// Route::get('posts/{post:slug}', function (Post $post) { // wrap model binding

//     return view('post', [
//         'post' => $post
//     ]);
// });
