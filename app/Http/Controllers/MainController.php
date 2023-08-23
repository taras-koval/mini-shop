<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->paginate(9);
        return view('home', compact('products'));
    }
}
