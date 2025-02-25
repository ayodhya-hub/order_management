<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_price' => 'required|numeric'
        ]);
        
        return Order::create($request->all());
    }

    public function checkout()
    {
        $cart = session('cart', []);
        return view('checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        // Here you would normally save the order to the database
        session()->forget('cart');
        return redirect('/')->with('success', 'Order placed successfully!');
    }
}
