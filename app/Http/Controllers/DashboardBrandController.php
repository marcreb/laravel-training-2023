<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBrandController extends Controller
{
    public function index()
    {
       return view('dashboard.brands.index', [
            'brands' => Brand::with('categories')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.brands.create', [
            'categories' => Category::with('brands')
            ->orderBy('name', 'asc') // Change 'asc' to 'desc' if you want to sort in descending order
            ->get()
        ]);
    }

    public function store()
    {
        $selectedCategories = request()->input('categories', []);

        $attributes = request()->validate([
            'name' => ['required', 'max:100', Rule::unique('brands', 'name')],
            'slug' =>  ['required', Rule::unique('brands', 'slug')],
        ]);


        // Create the product
        $brand = Brand::create($attributes);

        if (count($selectedCategories) > 0) {
            // Attach categories with the created brand
            $existingCategories = Category::whereIn('id', $selectedCategories)->pluck('id');
            $brand->categories()->attach($existingCategories);
        }

        return redirect('/dashboard/brands')->with('success', 'Brand Added');
    }



    public function check_slug(Request $request)
    {

        $slug = SlugService::createSlug(Brand::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);

    }
}
