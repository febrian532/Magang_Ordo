<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Dashboard</a>

    <div class="ms-auto d-flex gap-3">
        <a class="nav-link text-white" href="{{ route('admin.products.index') }}">Products</a>
        <a class="nav-link text-white" href="{{ route('admin.categories.index') }}">Categories</a>
        <a class="nav-link text-white" href="{{ route('admin.users.index') }}">Users</a>
        <a class="nav-link text-white" href="{{ route('admin.orders.index') }}">Orders</a>

        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>
