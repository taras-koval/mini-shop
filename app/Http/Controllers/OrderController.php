<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Product $product)
    {
        return view('order.create', compact('product'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'customer_phone' => 'nullable',
            'comment' => 'required|min:10',
        ]);

        $validatedData['status'] = OrderStatus::New;

        Order::create($validatedData);

        return view('order.thank-you');
    }
}
