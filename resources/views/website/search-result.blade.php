@extends('layouts.website')
@section('content')

    @if(count($data) > 0)
    <div class="container py-5">
      <div class="row">
        
        @foreach($data as $product)
          <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card rounded-0 text-center product-card">
              <div class="card-body py-4 py-lg-5">
              <div class="img-box">
                <img src="{{url('')}}/products/{{$product->product_image}}" class="img-fluid product-img" />
              </div>
                <div class="content pt-4">
                  <h6 class="text-capitalize mb-1">{{$product->product_name}}</h6>
                  <p>Price: {{$product->product_price}} tk</p>
                  <button type="button" class="btn btn-sm btn-light shadow-none px-3 add-to-cart" onclick="addToCart({{$product->id}})">Add to cart</button>
                </div>
              </div>
              
              <!-- Hot product -->
              <?php if($product->product_type == 'hot'){ ?>
                <div class="hot hot-bg">
                  <p class="mb-0">Hot</p>
                </div>
                <?php 
                  } 
                  if($product->product_type == 'new'){ 
                ?>
                  <!-- New product -->
                <div class="hot bg-success">
                  <p class="mb-0">New</p>
                </div>
                <?php } ?>

            </div>
          </div>
        @endforeach

      </div>
    </div>

    @else
      <div class="not-found">
        <div class="flex-center flex-column">
          <img src="{{url('')}}/website/static/404.png" class="img-fluid">
          <br><br>
          <a href="{{route('home')}}" class="custom_orange-btn rounded-0 shadow-none">Back to home</a>
        </div>
      </div>
    @endif

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