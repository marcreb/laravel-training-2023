<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardCategoryController extends Controller
{
    public function index()
    {
       return view('dashboard.categories.index', [
            'categories' => Category::with('brands')
                ->orderBy('id', 'desc') // Change 'asc' to 'desc' if you want to sort in descending order
                ->get()
        ]);


    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all()
        ]);
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
            'categories' => Category::with('brands')
            ->orderBy('id', 'desc') // Change 'asc' to 'desc' if you want to sort in descending order
            ->get()

        ]);
    }

    public function update(Category $category)
    {
        $selectedCategories = request()->input('categories');

        $attributes = request()->validate([
            'name' => ['required', 'max:100', Rule::unique('categories', 'name')->ignore($category->id)],
            'slug' =>  ['required', Rule::unique('categories', 'slug')->ignore($category->id)],
            'categories' =>  ['nullable', Rule::exists('categories', 'id')],
        ]);


       $attributes['parent_id'] = $selectedCategories ?? null;

        // Create the product
        $category->update($attributes);

        return back()->with('success', 'Category Updated!');
    }

    public function store()
    {
        $selectedCategories = request()->input('categories');

        $attributes = request()->validate([
            'name' => ['required', 'max:100', Rule::unique('categories', 'name')],
            'slug' =>  ['required', Rule::unique('categories', 'slug')],
            'categories' =>  ['nullable', Rule::exists('categories', 'id')],
        ]);


       $attributes['parent_id'] = $selectedCategories ?? null;

        // Create the product
        Category::create($attributes);

        return redirect('/dashboard/categories')->with('success', 'Category Added');
    }

    public function check_slug(Request $request)
    {

        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);

    }
}
