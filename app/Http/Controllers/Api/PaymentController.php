<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function callback(Request $request)
    {
        $orderId = $request->order_id;
        $status = $request->transaction_status;

        $order = Order::where('order_number', $orderId)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        if ($status == 'settlement') {
            $order->status = 'paid';
        } elseif ($status == 'expire') {
            $order->status = 'expired';
        } elseif ($status == 'deny' || $status == 'cancel') {
            $order->status = 'failed';
        }

        $order->save();

        return response()->json(['message' => 'Payment status updated']);
    }
}
