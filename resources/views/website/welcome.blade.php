@extends('layouts.website')
@section('content')

<div class="hero_area">
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

        @foreach($banners as $key => $banner)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail pl-lg-3">
                        <div>
                          <h1>{{$banner->banner_title}}</h1>
                          <p>{{$banner->banner_description}}</p>
                          <div class="d-flex">
                            <a href="{{route('offer')}}" class="text-uppercase custom_orange-btn mr-3">
                              buy Now
                            </a>
                            <a href="{{route('contact')}}" class="text-uppercase custom_dark-btn">
                              Contact Us
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="{{url('')}}/banners/{{$banner->banner_image}}" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
        </div>
        <div class="custom_carousel-control">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
  </div>

<!-- Core Service -->
<div class="container core-section pt-5 pb-lg-5 mt-lg-5">
  <div class="row">

    <div class="col-6 col-lg-3 mb-5 mb-lg-0 text-center px-4">
      <img src="{{url('')}}/website/static/1.png" class="img-fluid mb-4">
      <h4 class="mb-3">Best Quality</h4>
      <p class="text-muted d-none d-lg-block">Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.</p>
    </div>

    <div class="col-6 col-lg-3 mb-5 mb-lg-0 text-center px-4">
      <img src="{{url('')}}/website/static/2.png" class="img-fluid mb-4">
      <h4 class="mb-3">MasterChefs</h4>
      <p class="text-muted d-none d-lg-block">Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.</p>
    </div>

    <div class="col-6 col-lg-3 mb-5 mb-lg-0 text-center px-4">
      <img src="{{url('')}}/website/static/3.png" class="img-fluid mb-4">
      <h4 class="mb-3">Fast Delivery</h4>
      <p class="text-muted d-none d-lg-block">Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.</p>
    </div>

    <div class="col-6 col-lg-3 mb-5 mb-lg-0 text-center px-4">
      <img src="{{url('')}}/website/static/4.png" class="img-fluid mb-4">
      <h4 class="mb-3">Set Meal Deals</h4>
      <p class="text-muted d-none d-lg-block">Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.</p>
    </div>


  </div>
</div>
<!-- End Core Service -->


  <!-- Product section -->
    <div class="container py-5">
    <?php 
      use App\Models\Category;
      use App\Models\Product;
      $categories = Category::where('cat_name', '!=', 'Bangla')
                            ->where('cat_name', '!=', 'offer')
                            ->where('cat_name', '!=', 'break-fast')
                            ->where('cat_name', '!=', 'lunch')
                            ->where('cat_name', '!=', 'dinner')
                            ->get();
        foreach($categories as $category){
    ?>
    
      <div class="row mb-4 mb-lg-5">
        <div class="col-12 mb-5">
          <div class="d-flex">
            <div>
              <h5 class="mb-0 text-capitalize text-dark mt-2">{{$category->cat_name}}</h5>
            </div>
            <div class="ml-auto">
              <a href="{{route('category', $category->id)}}" class="custom_orange-btn rounded-0 shadow-none">View all</a>
            </div>
          </div>
        </div>
    
        
        <?php
          $products = Product::where('category_id', '=', $category->id)
                  ->where('product_status', '=', 1)
                  ->orderBy('id', 'DESC')
                  ->take(4)
                  ->get();
            foreach($products as $product){
          ?>

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
        
        <?php 
          }
        ?>
        
      </div>
      <?php
        }
      ?>

    </div>
  <!-- end Product section -->


  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <h2 class="custom_heading">Testimonial</h2>
      <p class="custom_heading-text">
        There are many variations of passages of Lorem Ipsum available, but
        the majority have
      </p>
      <div>
        <div id="carouselExampleControls-2" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">

          @foreach($testimonials as $testimonial)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
              <div class="client_container layout_padding2">
                <div class="client_img-box">
                  <img src="{{url('')}}/testimonials/{{$testimonial->image}}" class="img-fluid testimonial-img" />
                </div>
                <div class="client_detail">
                  <h3>{{$testimonial->name}}</h3>
                  <p class="custom_heading-text">{{$testimonial->description}}</p>
                </div>
              </div>
            </div>
          @endforeach

          </div>
          <div class="custom_carousel-control">
            <a class="carousel-control-prev" href="#carouselExampleControls-2" role="button" data-slide="prev">
              <span class="" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls-2" role="button" data-slide="next">
              <span class="" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Contact Us
      </h2>
      <div class="row">
        <div class="col-md-8 mr-auto">
          <!-- <form action="{{route('sendmessage')}}" method="post"> -->
          <form>
            <!-- @csrf -->
            <div class="contact_form-container">
              <div>
                <div class="mb-3">
                  <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="phone" placeholder="Phone Number" required>
                </div>
                <div class="mb-3">
                  <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="mt-5">
                  <input type="text" name="message" placeholder="Message" required>
                </div>
                <div class="mt-5">
                  <button type="submit">
                    send
                  </button>
                </div>
              </div>

            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->


  <!-- map section -->
  <section class="map_section">
    <div id="map" class="h-100 w-100 ">
    </div>
  </section>

  <!-- end map section -->
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