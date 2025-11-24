@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <h3 class="text-center">Register Admin</h3>

    <form method="POST" action="{{ route('admin.register.submit') }}">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button class="btn btn-success w-100">Daftar</button>
    </form>
</div>
@endsection
