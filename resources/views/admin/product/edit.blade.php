@extends('layouts.app')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-4">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Edit product</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.product.index')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-chevron-left"></i></a>
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
                    <form action="{{route('admin.product.update', $data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Category -->
                        <div class="form-group mb-4">
                            @if($errors->has('category'))
                                <small class="text-danger">{{ $errors->first('category') }}</small>
                            @else
                                <small class="text-muted">Category</small>
                            @endif
                            <br>
                            <select name="category" class="form-control form-control-lg rounded-0 shadow-none select2" style="width: 100%;">
                                <option value="">Select category</option>
                                @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <!-- Product name -->
                        <div class="form-group mb-4">
                            @if($errors->has('product_name'))
                                <small class="text-danger">{{ $errors->first('product_name') }}</small>
                            @else
                                <small class="text-muted">Product name</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="product_name" value="{{$data->product_name}}">
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

                        <!-- Product type -->
                        <div class="form-group mb-4">
                            @if($errors->has('product_type'))
                                <small class="text-danger">{{ $errors->first('product_type') }}</small>
                            @else
                                <small class="text-muted">Product type</small>
                            @endif
                            <select name="product_type" class="form-control form-control-lg rounded-0 shadow-none">
                                <option value="">Select type</option>
                                <option value="new">New</option>
                                <option value="hot">Hot</option>
                                <option value="regular">Regular</option>
                            </select>
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

                        <button type="submit" class="btn btn-lg btn-primary rounded-0 shadow-none float-right text-white px-5">Update</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>

@endif

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

@endsection
