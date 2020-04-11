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

            @foreach($offerData as $item)
                <div class="col-12 col-md-6 mb-4">
                    <div class="row">
                        <div class="col-12 col-lg-8 pr-lg-0 text-center">
                            <div class="product-img-box">
                                <img src="{{url('')}}/products/{{$item->product_image}}" class="img-fluid">
                            </div>
                            
                        </div>
                        <div class="col-12 col-lg-4 text-center pl-lg-0">
                            <div class="border p-4 product">
                                <h6 class="text-capitalize mb-3">{{$item->product_name}}</h6>
                                <div class="mt-3">
                                    <small class="text-muted">Price: {{$item->product_price}}tk</small><br><br>
                                    <button type="button" class="btn btn-sm btn-light shadow-none px-3 add-to-cart mt-2" onclick="addToCart({{$item->id}})">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

               
            </div>
        </div>

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
