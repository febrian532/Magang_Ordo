<div class="sidebar bg-dark text-white p-3" style="width: 230px; float: left; height:100vh;">
    <h4>ADMIN</h4>
    <ul class="nav flex-column">
        <li><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
        <li><a href="{{ route('admin.categories.index') }}" class="nav-link text-white">Categories</a></li>
        <li><a href="{{ route('admin.products.index') }}" class="nav-link text-white">Products</a></li>
        <li><a href="{{ route('admin.users.index') }}" class="nav-link text-white">Users</a></li>
        <li><a href="{{ route('admin.orders.index') }}" class="nav-link text-white">Orders</a></li>
    </ul>
</div>
