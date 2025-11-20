<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\MidtransService;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'total_price' => 'required|numeric'
        ]);

        // Create order
        $order = Order::create([
            'user_id' => $request->user_id,
            'order_number' => 'INV-' . time(),
            'total_price' => $request->total_price,
            'status' => 'pending'
        ]);

        // Snap Token
        $midtrans = new MidtransService();
        $snapToken = $midtrans->createSnapToken($order);

        return response()->json([
            'message' => 'Checkout berhasil',
            'snap_token' => $snapToken,
            'order' => $order
        ]);
    }
}
