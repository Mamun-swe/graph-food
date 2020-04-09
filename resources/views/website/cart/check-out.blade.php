@extends('layouts.website')
@section('content')


<div class="container py-4 py-lg-5 mt-lg-5 check-out-page">
    <div class="row">
        <div class="col-12 col-lg-7 mb-4 mb-lg-0">
            <h6 class="mb-3 hot-text"><b>Billing Details</b></h6>
            <div class="card rounded-0 border-0 shadow-sm">
                <div class="card-body py-4 py-lg-5">
                    @if(Session::has('success'))
                        <h5 class="text-success">{{Session::get('success')}}</h5>
                    @endif
                    
                    <form action="{{route('account.cart.order')}}" method="post">
                        @csrf

                        <!-- User Name -->
                        <div class="form-group mb-4">
                            <small class="text-muted">Name *</small>
                            <input type="text" class="form-control rounded-0 shadow-none border-0" name="user_name" value="{{Auth::User()->name}}" disabled>
                        </div>

                        <!-- E-mail -->
                        <div class="form-group mb-4">
                            <small class="text-muted">E-mail *</small>
                            <input type="text" class="form-control rounded-0 shadow-none border-0" name="user_email" value="{{Auth::User()->email}}" disabled>
                        </div>

                        <!-- Phone -->
                        <div class="form-group mb-4">
                            @if($errors->has('phone'))
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                            @else
                            <small class="text-muted">Phone *</small>
                            @endif
                            <input type="text" class="form-control rounded-0 shadow-none" name="phone" placeholder="Pattern ( 01xxxxxxxxx )">
                        </div>

                        <!-- Location -->
                        <div class="form-group mb-4">
                            @if($errors->has('location'))
                                <small class="text-danger">{{ $errors->first('location') }}</small>
                            @else
                            <small class="text-muted">Location *</small>
                            @endif
                            <select name="location" class="form-control rounded-0 shadow-none">
                                <option value="" selected>Select Location</option>
                                <option value="campus">Daffodil International University, Permanent Campus</option>
                                <option value="yksg-ext-1">Younus Khan Scholar's Garden Extension 1</option>
                                <option value="yksg-ext-2">Younus Khan Scholar's Garden Extension 2</option>
                                <option value="yksg-female-hall">Younus Khan Scholar's Garden Female Hall</option>
                                <option value="dattapara">Dattapara</option>
                                <option value="khagan">Khagan Bazar</option>
                            </select>
                        </div>

                        <button type="submit" class="btn custom_orange-btn btn-block text-white shadow-none">Place Order</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5 pl-lg-5">
            <h6 class="mb-3 hot-text"><b>Cart Summary</b></h6>
            <div class="card rounded-0 border-0 shadow-sm">
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-1">

                        @php 
                            $sum = 0;
                        @endphp
                       
                        @foreach($data as $item)
                        <tr>
                            <td><p class="text-capitalize mb-0">{{$item->product_name}}</p></td>
                            <td class="text-right"><p class="text-capitalize mb-0">{{$item->quantity}} pcs</p></td>
                            <td class="text-right">
                                <p class="text-capitalize mb-0"> 
                                @php 
                                    $sum = $sum + $item->quantity * $item->product_price;
                                @endphp
                                    {{$item->quantity * $item->product_price}}
                                tk</p>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="text-right mt-2">
                        <p class="mb-0">Sub-total: <b>{{$sum}}</b> tk</p>
                        <p class="mb-0">Shipping cost: <b>50</b> tk</p>
                        <hr class="mt-2 mb-1">
                        <h6>Total: {{$sum}} tk</h6>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection