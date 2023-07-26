<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        return view('products.index', [
            'products' => Product::latest()->filter(request(['search', 'brand']))->get(),
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'currentBrand' => Brand::firstWhere('slug', request('brand'))
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function showCategories(Category $category)
    {
        $filters = [
            'search' => request('search'),
            'brand' => request('brand'),
            'category' => $category->id, // Pass the category's ID here
        ];

        $products = Product::latest()->filter($filters)->get();

        return view('products/categories.index', [
            'products' => $products,
            'brands' => $category->brands,
            'categories' => Category::all(),
            'currentBrand' => Brand::firstWhere('slug', request('brand')),
        ]);
    }
}
