@extends('layouts.website')
@section('content')

<section class="service_section layout_padding ">
    <div class="container">
      <h2 class="custom_heading">Our Services</h2>
      <p class="custom_heading-text">
        There are many variations of passages of Lorem Ipsum available, but
        the majority have
      </p>
      <div class=" layout_padding2">
        <div class="card-deck">
          <div class="card">
            <img class="card-img-top" src="{{url('')}}/website/static/card-item-1.png" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Orange</h5>
              <p class="card-text">
                There are many variations of passages of Lorem Ipsum
                available, but the majority have suffered alteration in some
                form, by injected humour, or randomised words which don't look
                even slightly believable.
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="{{url('')}}/website/static/card-item-2.png" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Grapes</h5>
              <p class="card-text">
                There are many variations of passages of Lorem Ipsum
                available, but the majority have suffered alteration in some
                form, by injected humour, or randomised words which don't look
                even slightly believable.
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="{{url('')}}/website/static/card-item-3.png" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title">Gauva</h5>
              <p class="card-text">
                There are many variations of passages of Lorem Ipsum
                available, but the majority have suffered alteration in some
                form, by injected humour, or randomised words which don't look
                even slightly believable.
              </p>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </section>

@endsection