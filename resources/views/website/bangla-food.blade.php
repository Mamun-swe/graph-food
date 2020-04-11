@extends('layouts.website')
@section('content')

<div class="products-page bangla-items">


    <div class="header">
        <div class="flex-center flex-column">
            <h1 class="text-capitalize text-dark">Bangla Food</h1>
        </div>
    </div>

    <div class="container py-5">

    <!-- break fast -->
        @if(count($breakFastData) > 0)
        <div class="mb-4 mb-lg-5">
            <div class="row">
                <div class="col-12 mb-4">
                    <h5 class="mb-0 text-capitalize">breakfast (please order within 10:00 AM)</h5>
                </div>
            </div>

            <div class="row">

                @foreach($breakFastData as $breakFast)
                <div class="col-12 col-md-6 mb-4">
                    <div class="row">
                        <div class="col-12 col-lg-6 pr-lg-0">
                            <div class="product-img-box">
                                <img src="{{url('')}}/products/{{$breakFast->product_image}}" class="img-fluid w-100">
                            </div>
                            
                        </div>
                        <div class="col-12 col-lg-6 text-center pl-lg-0">
                            <div class="border p-4 product">
                                <h6 class="text-capitalize mb-3">{{$breakFast->product_name}}</h6>
                                <p class="mb-0">{{$breakFast->total_item}} items</p>
                                <small class="text-capitalize">{{$breakFast->item_details}}</small><br>
                                <div class="mt-3">
                                    <small class="text-muted">Price: {{$breakFast->product_price}}tk</small><br>
                                    <button type="button" class="btn btn-sm btn-light shadow-none px-3 add-to-cart mt-2" onclick="addToCart({{$breakFast->id}})">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
           
            </div>
        </div>
        @endif
        <!-- /Break fast -->

        <!-- Launce -->
        @if(count($launceData) > 0)
        <div class="mb-4 mb-lg-5">
            <div class="row">
                <div class="col-12 mb-4">
                    <h5 class="mb-0 text-capitalize">lauce (please order within 10:00 PM to 03:00 PM)</h5>
                </div>
            </div>

            <div class="row">

                @foreach($launceData as $launce)
                <div class="col-12 col-md-6 mb-4">
                    <div class="row">
                        <div class="col-12 col-lg-6 pr-lg-0">
                            <div class="product-img-box">
                                <img src="{{url('')}}/products/{{$launce->product_image}}" class="img-fluid w-100">
                            </div>
                            
                        </div>
                        <div class="col-12 col-lg-6 text-center pl-lg-0">
                            <div class="border p-4 product">
                                <h6 class="text-capitalize mb-3">{{$launce->product_name}}</h6>
                                <p class="mb-0">{{$launce->total_item}} items</p>
                                <small class="text-capitalize">{{$launce->item_details}}</small><br>
                                <div class="mt-3">
                                    <small class="text-muted">Price: {{$launce->product_price}}tk</small><br>
                                    <button type="button" class="btn btn-sm btn-light shadow-none px-3 add-to-cart mt-2" onclick="addToCart({{$launce->id}})">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
           
            </div>
        </div>
        @endif
        <!-- /Launce -->


        <!-- Dinner -->
        @if(count($dinnerData) > 0)
        <div class="mb-4 mb-lg-5">
            <div class="row">
                <div class="col-12 mb-4">
                    <h5 class="mb-0 text-capitalize">lauce (please order within 08:00 PM to 11:00 PM)</h5>
                </div>
            </div>

            <div class="row">

                @foreach($dinnerData as $dinner)
                <div class="col-12 col-md-6 mb-4">
                    <div class="row">
                        <div class="col-12 col-lg-6 pr-lg-0">
                            <div class="product-img-box">
                                <img src="{{url('')}}/products/{{$dinner->product_image}}" class="img-fluid w-100">
                            </div>
                            
                        </div>
                        <div class="col-12 col-lg-6 text-center pl-lg-0">
                            <div class="border p-4 product">
                                <h6 class="text-capitalize mb-3">{{$dinner->product_name}}</h6>
                                <p class="mb-0">{{$dinner->total_item}} items</p>
                                <small class="text-capitalize">{{$dinner->item_details}}</small><br>
                                <div class="mt-3">
                                    <small class="text-muted">Price: {{$dinner->product_price}}tk</small><br>
                                    <button type="button" class="btn btn-sm btn-light shadow-none px-3 add-to-cart mt-2" onclick="addToCart({{$dinner->id}})">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
           
            </div>
        </div>
        @endif
        <!-- /Dinner -->


    </div>
</div>
<?php
    $user = "";
    if(Auth::User() && Auth::User()->admin == 0){
      $user = Auth::User()->id;
    }else{
      $user = "null";
    }
  ?>

<script>
  function addToCart(product_id){
    var user = <?php echo $user; ?>;
    if(user == null){
      notif({
        type: "error",
        msg: "<b>You have to need login your account.</b>",
        position: "center",
      });
    }else{
      var data = {
        product_id: product_id,
        user_id: user
      }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            type: "POST",
            url: "{{route('account.cart.store')}}",
            data: data,
            success:function(response){
              if(response == 'success'){
                notif({
                  type: "success",
                  msg: "<b>One item added into cart.</b>",
                  position: "right",
                });
              }

              if(response == 'exist'){
                notif({
                  type: "error",
                  msg: "<b>This item already added to you cart.</b>",
                  position: "right",
                });
              }
            },
            error: function (error) {
                if(error){
                  console.log(error);
                }
            }
        })
    }
    
  }
</script>
@endsection
