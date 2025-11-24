@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <h3 class="text-center">Admin Login</h3>

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
