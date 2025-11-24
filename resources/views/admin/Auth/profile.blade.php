@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Profil Akun</h3>

    <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Password Baru (opsional)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button class="btn btn-primary">Update Profil</button>
    </form>
</div>
@endsection
