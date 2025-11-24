<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.dashboard', [
            'total_products'   => Product::count(),
            'total_categories' => Category::count(),
            'total_orders'     => Order::count(),
            'total_users'      => User::count(),
        ]);
    }
}
