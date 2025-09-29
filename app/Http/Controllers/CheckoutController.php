<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product')->where('user_id', Auth::id())->firstOrFail();
        return view('checkout', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'billing_address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cart = Cart::with('items.product')->where('user_id', Auth::id())->firstOrFail();

        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'total' => $cart->items->sum(fn($item) => ($item->product->discount_price ?? $item->product->price) * $item->quantity),
            'shipping_address' => $request->shipping_address,
            'billing_address' => $request->billing_address,
            'payment_method' => $request->payment_method,
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->discount_price ?? $item->product->price,
            ]);
        }

        // يمكن هنا تضيف payment processing حقيقي
        Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total,
            'payment_method' => $request->payment_method,
            'status' => 'paid', // للتجربة
        ]);

        // مسح السلة
        $cart->items()->delete();

        return redirect('/')->with('success', 'Order placed successfully!');
    }
}
