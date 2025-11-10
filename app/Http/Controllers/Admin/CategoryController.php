<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function getData(Request $request)
    {
        $categories = Category::select(['id', 'name', 'description', 'created_at']);

        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Hapus</button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
