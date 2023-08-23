<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
            'customer_name' => ['required'],
            'customer_email' => ['nullable', 'email', 'max:254'],
            'customer_phone' => ['required'],
            'comment' => ['nullable'],
            'status' => ['required'],
        ]);

        return Order::create($request->validated());
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'product_id' => ['required'],
            'customer_name' => ['required'],
            'customer_email' => ['nullable', 'email', 'max:254'],
            'customer_phone' => ['required'],
            'comment' => ['nullable'],
            'status' => ['required'],
        ]);

        $order->update($request->validated());

        return $order;
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json();
    }
}
