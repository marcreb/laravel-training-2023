<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Category $category)
    {

        $filters = [
            'search' => request('search'),
            'brand' => request('brand'),
            'category' => $category->id, // Pass the category's ID here
        ];

        $brandFilter = $category->id ? $category->brands : Brand::all();

        // $products = Product::latest()->filter($filters)->get();
        $products = Product::latest()->filter($filters)->paginate(2)->withQueryString();

        return view('products/categories.index', [
            'products' => $products,
            'brands' => $brandFilter,
            'categories' => Category::all(),
            'currentBrand' => Brand::firstWhere('slug', request('brand')),
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function create()
    {
        return view('products.create', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }

    public function getBrands(Request $request)
    {
        $selectedCategories = $request->input('categories', []);

        // Get the brands that belong to the selected category
        $brands = Brand::whereIn('category_id', $selectedCategories)
            ->select('id', 'name')
            ->get();

        return response()->json($brands);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:100'],
            'slug' =>  ['required', Rule::unique('products', 'slug')],
            'price' => ['required', 'numeric', 'min:0', 'max:99999999999999.99'],
            'categories' => ['required', 'array', Rule::exists('categories', 'id')],
            'brands' => ['required', 'array', Rule::exists('brands', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();

        // Create the product
        $product = Product::create($attributes);

        // Associate categories with the created product
        $product->categories()->attach($attributes['categories']);

        // Associate brands with the created product
        $product->brands()->attach($attributes['brands']);

        return redirect('/')->with('success', 'Product Added');
    }
}
