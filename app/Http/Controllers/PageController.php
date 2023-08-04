<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Money\Money;



class PageController extends Controller
{
    public function index()
    {
        $filters = [
            'search' => request('search'),
            'brand' => request('brand'),
            'category' => request('category'),
        ];

        $products = Product::query()
            ->with('brands', 'category') // Load the related brand and category for each product
            ->filter($filters)
            ->latest()
            ->paginate(5)
            ->withQueryString();
            // dd($products);
        $brands = Brand::all();
        $categories = Category::all();

        return view('pages.index', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
            'currentCategory' => Category::firstWhere('slug', request('category')),
            'currentBrand' => Brand::firstWhere('slug', request('brand')),
        ]);
    }


}
