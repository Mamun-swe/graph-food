@extends('layouts.app')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-4">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Edit item</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.bangla.index')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($data)
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-12 col-lg-6 m-auto">
                    @if(Session::has('success'))
                        <p class="text-success mb-0">{{Session::get('success')}}</p>
                    @endif
                    <form action="{{route('admin.bangla.update', $data->id)}}" method="post">
                        @csrf
                        @method('PUT')

                        <!-- Product name -->
                        <div class="form-group mb-4">
                            @if($errors->has('product_name'))
                                <small class="text-danger">{{ $errors->first('product_name') }}</small>
                            @else
                                <small class="text-muted">Product name</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="product_name" value="{{$data->product_name}}">
                        </div>


                        <!-- Total Item -->
                        <div class="form-group mb-4">
                            @if($errors->has('total_item'))
                                <small class="text-danger">{{ $errors->first('total_item') }}</small>
                            @else
                                <small class="text-muted">Total item</small>
                            @endif
                            <input type="number" min="1" class="form-control form-control-lg rounded-0 shadow-none" name="total_item" value="{{$data->total_item}}">
                        </div>


                        <!-- Product price -->
                        <div class="form-group mb-4">
                            @if($errors->has('product_price'))
                                <small class="text-danger">{{ $errors->first('product_price') }}</small>
                            @else
                                <small class="text-muted">Product price</small>
                            @endif
                            <input type="number" class="form-control form-control-lg rounded-0 shadow-none" name="product_price" value="{{$data->product_price}}">
                        </div>


                        <!-- Item details -->
                        <div class="form-group mb-4">
                            @if($errors->has('item_details'))
                                <small class="text-danger">{{ $errors->first('item_details') }}</small>
                            @else
                                <small class="text-muted">Item details</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="item_details" value="{{$data->item_details}}">
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary rounded-0 shadow-none float-right text-white px-5">Update</button>
                    </form>
                </div>
            </div>
        </div>
        @endif



    </div>
</div>

@endsection
