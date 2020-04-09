@extends('layouts.app')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-4">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Make bangla item</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.bangla.index')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-12 col-lg-6 m-auto">
                    @if(Session::has('success'))
                        <p class="text-success mb-0">{{Session::get('success')}}</p>
                    @endif
                    <form action="{{route('admin.bangla.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Category -->
                        <div class="form-group mb-4">
                            @if($errors->has('category'))
                                <small class="text-danger">{{ $errors->first('category') }}</small>
                            @else
                                <small class="text-muted">Category</small>
                            @endif
                            <br>
                            <select name="category" class="form-control form-control-lg rounded-0 shadow-none">
                                <option value="">Select category</option>
                                <option value="breakfast">Breakfast</option>
                                <option value="launce">Launce</option>
                                <option value="dinner">Dinner</option>
                            </select>
                        </div>


                        <!-- Product name -->
                        <div class="form-group mb-4">
                            @if($errors->has('product_name'))
                                <small class="text-danger">{{ $errors->first('product_name') }}</small>
                            @else
                                <small class="text-muted">Product name</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="product_name" placeholder="Product name">
                        </div>


                        <!-- Total Item -->
                        <div class="form-group mb-4">
                            @if($errors->has('total_item'))
                                <small class="text-danger">{{ $errors->first('total_item') }}</small>
                            @else
                                <small class="text-muted">Total item</small>
                            @endif
                            <input type="number" min="1" class="form-control form-control-lg rounded-0 shadow-none" name="total_item" placeholder="Total item">
                        </div>


                        <!-- Product price -->
                        <div class="form-group mb-4">
                            @if($errors->has('product_price'))
                                <small class="text-danger">{{ $errors->first('product_price') }}</small>
                            @else
                                <small class="text-muted">Product price</small>
                            @endif
                            <input type="number" class="form-control form-control-lg rounded-0 shadow-none" name="product_price" placeholder="Price">
                        </div>


                        <!-- Item details -->
                        <div class="form-group mb-4">
                            @if($errors->has('item_details'))
                                <small class="text-danger">{{ $errors->first('item_details') }}</small>
                            @else
                                <small class="text-muted">Item details</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="item_details" placeholder="Item details">
                        </div>


                        <!-- Product image -->
                        <div class="form-group mb-4">
                            @if($errors->has('product_image'))
                                <small class="text-danger">{{ $errors->first('product_image') }}</small>
                            @else
                                <small class="text-muted">Product image</small>
                            @endif
                            <br>
                            <input type="file" name="product_image">
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary rounded-0 shadow-none float-right text-white px-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>

@endsection
