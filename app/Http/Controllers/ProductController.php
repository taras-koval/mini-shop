<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function testFilters(Request $request)
    {
        $products = Product::filter($request)->get();

        return response()->json($products);
    }
}
