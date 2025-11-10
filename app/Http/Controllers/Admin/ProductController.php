<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }
public function getData(Request $request)
{
    $products = Product::with('category')->select('products.*');

    return DataTables::of($products)
        ->addIndexColumn()
        ->addColumn('category', function ($row) {
            return $row->category ? $row->category->name : '-';
        })
        ->addColumn('image', function ($row) {
            $imagePath = $row->image ? asset('storage/'.$row->image) : 'https://via.placeholder.com/50';
            return '<img src="'.$imagePath.'" width="50">';
        })
        ->addColumn('action', function ($row) {
            return '
                <a href="'.route('admin.products.edit', $row->id).'" class="btn btn-warning btn-sm">Edit</a>
                <form action="'.route('admin.products.destroy', $row->id).'" method="POST" style="display:inline;">
                    '.csrf_field().method_field('DELETE').'
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            ';
        })
        ->rawColumns(['image', 'action'])
        ->make(true);
}
}
