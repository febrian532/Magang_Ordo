<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    }

    public function getData(Request $request)
    {
        $orders = Order::with('user')->select('orders.*');

        return DataTables::of($orders)
            ->addIndexColumn()
            ->addColumn('user', fn($row) => $row->user->name ?? '-')
            ->addColumn('status', fn($row) => ucfirst($row->status))
            ->addColumn('action', fn($row) => '
                <a href="'.route('admin.orders.index').'/'.$row->id.'" class="btn btn-info btn-sm">Detail</a>
                <button class="btn btn-danger btn-sm">Hapus</button>
            ')
            ->rawColumns(['action'])
            ->make(true);
    }
}
