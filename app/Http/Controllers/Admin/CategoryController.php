<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
                    <a href="'.route('admin.categories.edit', $row->id).'" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Hapus</button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->only('name', 'description'));

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->only('name', 'description'));

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return response()->json(['status' => 'success']);
    }
}
