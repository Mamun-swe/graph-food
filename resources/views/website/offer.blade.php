@extends('layouts.website')
@section('content')

<div class="products-page offer">


    <div class="header">
        <div class="flex-center flex-column">
            <h1 class="text-capitalize text-dark">Flash Offer</h1>
        </div>
    </div>

    <div class="container py-5">

    <!-- offer -->
        <div class="mb-4 mb-lg-5">
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <div class="row">
                        <div class="col-12 col-lg-8 pr-lg-0 text-center">
                            <div class="product-img-box">
                                <img src="{{url('')}}/products/1585149222.png" class="img-fluid">
                            </div>
                            
                        </div>
                        <div class="col-12 col-lg-4 text-center pl-lg-0">
                            <div class="border p-4 product">
                                <h6 class="text-capitalize mb-3">name</h6>
                                <div class="mt-3">
                                    <small class="text-muted">Price: 500tk</small><br><br>
                                    <button type="button" class="btn btn-sm btn-light shadow-none px-3 add-to-cart mt-2">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <div class="row">
                        <div class="col-12 col-lg-8 pr-lg-0 text-center">
                            <div class="product-img-box">
                                <img src="{{url('')}}/products/1585149222.png" class="img-fluid">
                            </div>
                            
                        </div>
                        <div class="col-12 col-lg-4 text-center pl-lg-0">
                            <div class="border p-4 product">
                                <h6 class="text-capitalize mb-3">name</h6>
                                <div class="mt-3">
                                    <small class="text-muted">Price: 500tk</small><br><br>
                                    <button type="button" class="btn btn-sm btn-light shadow-none px-3 add-to-cart mt-2">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
       
     
    </div>
</div>

@endsection
