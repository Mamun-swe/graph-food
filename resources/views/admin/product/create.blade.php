@extends('layouts.app')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-4">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Make new product</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.product.index')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-chevron-left"></i></a>
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
                    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Category -->
                        <div class="form-group mb-4">
                            @if($errors->has('category'))
                                <small class="text-danger">{{ $errors->first('category') }}</small>
                            @else
                                <small class="text-muted">Category</small>
                            @endif
                            <br>
                            <select name="category" id="category" class="form-control form-control-lg rounded-0 shadow-none select2" style="width: 100%;">
                                <option value="">Select category</option>
                                <?php
                                    use App\Models\Category;
                                    $categories = Category::all();
                                    foreach($categories as $category){
                                ?>
                                <option value="<?php echo $category->id; ?>" data-id="<?php echo $category->cat_name; ?>"><?php echo $category->cat_name; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Item type -->
                        <div class="form-group">
                            @if($errors->has('item_type'))
                                <small class="text-danger">{{ $errors->first('item_type') }}</small>
                            @else
                                <small class="text-muted">Product Type</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" id="itemType" name="item_type" readonly>
                        </div>


                        <!-- Product name -->
                        <div class="form-group mb-4">
                            @if($errors->has('product_name'))
                                <small class="text-danger">{{ $errors->first('product_name') }}</small>
                            @else
                                <small class="text-muted">Product name</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="product_name" placeholder="Enter product name">
                        </div>

                        <!-- Product price -->
                        <div class="form-group mb-4">
                            @if($errors->has('product_price'))
                                <small class="text-danger">{{ $errors->first('product_price') }}</small>
                            @else
                                <small class="text-muted">Product price</small>
                            @endif
                            <input type="number" class="form-control form-control-lg rounded-0 shadow-none" name="product_price" placeholder="Enter product price">
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

                        <!-- Total Items -->
                        <div class="form-group mb-4">
                            @if($errors->has('total_items'))
                                <small class="text-danger">{{ $errors->first('total_items') }}</small>
                            @else
                                <small class="text-muted">Total Items</small>
                            @endif
                            <input type="number" class="form-control form-control-lg rounded-0 shadow-none" value="1" name="total_items" id="total_items">
                        </div>

                        <!-- Item Details -->
                        <div class="form-group mb-4">
                            @if($errors->has('item_details'))
                                <small class="text-danger">{{ $errors->first('item_details') }}</small>
                            @else
                                <small class="text-muted">Item Details</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="item_details" value="none" id="item_details">
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

<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('#category').change(function(){
            $('#itemType').val($(this).find(':selected').attr('data-id'));
        });
    });
</script>

@endsection
