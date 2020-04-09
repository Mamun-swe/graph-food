@extends('layouts.app')
@section('content')

<div class="container dashboard">
    <div class="row">

    <div class="col-12 col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm mb-3">
            <div class="flex-center flex-column">
                <h4 class="mb-0"><b>{{$admin}}</b></h4>
                <h5>Admin</h5>
            </div>
            <div class="custom-overlay bg-warning"></div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm mb-3">
            <div class="flex-center flex-column">
                <h4 class="mb-0"><b>{{$users}}</b></h4>
                <h5>Users</h5>
            </div>
            <div class="custom-overlay bg-danger"></div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm mb-3">
            <div class="flex-center flex-column">
                <h4 class="mb-0"><b>{{$order}}</b></h4>
                <h5>Order</h5>
            </div>
            <div class="custom-overlay bg-warning"></div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm mb-3">
            <div class="flex-center flex-column">
                <h4 class="mb-0"><b>{{$pending}}</b></h4>
                <h5>Pending Orders</h5>
            </div>
            <div class="custom-overlay bg-primary"></div>
        </div>
    </div>
    
    <div class="col-12 col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm mb-3">
            <div class="flex-center flex-column">
                <h4 class="mb-0"><b>{{$category}}</b></h4>
                <h5>Category</h5>
            </div>
            <div class="custom-overlay bg-success"></div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm mb-3">
            <div class="flex-center flex-column">
                <h4 class="mb-0"><b>{{$products}}</b></h4>
                <h5>Products</h5>
            </div>
            <div class="custom-overlay bg-info"></div>
        </div>
    </div>

    

    

    

    

    </div>
</div>

@endsection
