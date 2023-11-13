<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('is_active', true)
            ->filter($request)
            ->paginate(9)
            ->appends($request->all());

        return view('home', compact('products'));
    }
}
