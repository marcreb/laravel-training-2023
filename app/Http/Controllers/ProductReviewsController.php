<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductReviewsController extends Controller
{
    public function store(Product $product)
    {
        // dd(request()->all());

        request()->validate([
            'body' => 'required'
        ]);

        $product->reviews()->create([
            'user_id' => auth()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
