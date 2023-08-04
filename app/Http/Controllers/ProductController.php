<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;

use App\Models\Category;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\http\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    public function index($categorySlug, $childCategorySlug = null)
    {

        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $childCategory = null;

        $filters = [
            'search' => request('search'),
            'brand' => request('brand'),
        ];

        // If a category is specified, filter products by the category's brands
        if ($category->id) {
            $brandFilter = $category->brands;

            // Include the brands from child categories
            $childBrands = $category->children->flatMap->brands;
            $brandFilter = $brandFilter->merge($childBrands)->unique('id');

            // Retrieve products from the specified category and its child categories
            $relatedCategoryIds = $category->getRelatedCategoryIds();

            $products = Product::whereHas('categories', function ($query) use ($relatedCategoryIds) {
                $query->whereIn('categories.id', $relatedCategoryIds);
            })
                ->with('brands')
                ->latest()
                ->filter($filters)
                ->paginate(5)
                ->withQueryString();
        } else {
            // No specific category, show all brands and all products
            $brandFilter = Brand::all();
            $products = Product::with(['brand', 'author']) // Load the related brands for each product
                ->latest()
                ->filter($filters)
                ->paginate(5)
                ->withQueryString();
        }

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
        return view('dashboard.products.create', [
            'categories' => Category::orderBy('name', 'asc')->get(),
            'brands' => Brand::all(),
        ]);
    }

    public function getBrands(Request $request)
    {


        // $selectedCategories = $request->input('categories', []);

        $selectedCategories = [1];
        // $brands = Brand::whereHas('category', function ($query) use ($selectedCategories) {
        //     $query->whereIn('id', $selectedCategories);
        // })->get();

        $categoryIds = $request->input('categories', []);
        // An array of category IDs you want to filter

        $brands = Brand::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })->get();

        // return response()->json($brands);
        return response()->json($brands);
    }

    public function store()
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:100', Rule::unique('products', 'name')],
            'slug' =>  ['required', Rule::unique('products', 'slug')],
            'image' =>  ['required', 'image', 'max:2048'],
            'price' => ['required', 'numeric', 'min:0', 'max:99999999999999.99'],
            'categories' => ['array', Rule::exists('categories', 'id')],
            'brands' => [ 'array', Rule::exists('brands', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();

        $attributes['image'] = request()->file('image')->store('product_images');

        // Create the product
        $product = Product::create($attributes);

        // Associate categories with the created product
        if(request('categories')){
        $product->categories()->attach($attributes['categories']);
        }
        // Associate brands with the created product
        if(request('brand')){
            $product->brands()->attach($attributes['brands']);
        }
        return redirect('/dashboard/products')->with('success', 'Product Added');
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }

    public function authorProducts(User $author)
    {
        $products = $author->products()
            ->with(['brand', 'categories'])
            ->latest()
            ->paginate(5); // Adjust the number of items per page as needed

        return view('products.categories.index', [
            'products' => $products,
            'brands' => Brand::all(),
        ]);
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'product' => $product,
            'categories' => Category::orderBy('name', 'asc')->get(),
            'brands' => Brand::all(),
        ]);
    }
}
