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

        // Nama Pemesan
        ->addColumn('pemesan', function($row){
            return $row->user->name ?? '-';
        })

        // Tanggal Pesanan
        ->addColumn('tanggal_pesanan', function($row){
            return $row->created_at->format('d-m-Y H:i');
        })

        // Total Harga
        ->addColumn('total_harga', function($row){
            return number_format($row->total_price, 0, ',', '.');
        })

        // Status
        ->addColumn('status', function($row){
            return ucfirst($row->status);
        })

        // Action
        ->addColumn('action', function($row){
            return '
                <a href="'.route('admin.orders.show', $row->id).'" class="btn btn-info btn-sm">Detail</a>
                <button class="btn btn-danger btn-sm">Hapus</button>
            ';
        })

        ->rawColumns(['action'])
        ->make(true);
}
}
