<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function getData(Request $request)
    {
        $users = User::select(['id', 'name', 'email', 'role', 'created_at']);

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                    <a href="'.route('admin.users.edit', $row->id).'" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Hapus</button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role'  => 'required|in:admin,user',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui');
    }
}
