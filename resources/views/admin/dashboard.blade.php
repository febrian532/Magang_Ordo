@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<h2>Welcome, Admin!</h2>

<div class="row mt-4">

    <div class="col-md-3">
        <div class="card text-bg-primary">
            <div class="card-body">
                <h4>{{ $total_products }}</h4>
                <p>Products</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-success">
            <div class="card-body">
                <h4>{{ $total_categories }}</h4>
                <p>Categories</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-warning">
            <div class="card-body">
                <h4>{{ $total_orders }}</h4>
                <p>Orders</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-danger">
            <div class="card-body">
                <h4>{{ $total_users }}</h4>
                <p>Users</p>
            </div>
        </div>
    </div>

</div>
@endsection
