<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    public function index()
    {
        return view('dashboard.products.index', [
            'products' => Product::with('categories', 'brands')
                ->orderBy('id', 'desc') // Change 'asc' to 'desc' if you want to sort in descending order
                ->get()
        ]);

    }
}
