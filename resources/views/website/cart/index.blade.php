@extends('layouts.website')
@section('content')


<div class="container py-4 py-lg-5 mt-lg-5 cart-page">
    <div class="row">

        <div class="col-12 text-center py-4">
            @if(Session::has('success'))
                <h5 class="text-success">{{Session::get('success')}}</h5>
            @endif
        </div>

        @if(count($data) > 0)
        <div class="col-12">
        
            <h6 class="mb-3 hot-text"><b>My Shopping Bag</b></h6>
            
            <table class="table table-responsive-md table-borderless">
                <thead>
                    <tr class="border-bottom">
                        <td class="text-center"><p class="mb-0">Product</p></td>
                        <td class="text-center"><p class="mb-0">Name</p></td>
                        <td class="text-center"><p class="mb-0">Quantity</p></td>
                        <td class="text-center"><p class="mb-0">Price</p></td>
                        <td class="text-center"><p class="mb-0">Total</p></td>
                        <td class="text-center"><p class="mb-0">Action</p></td>
                    </tr>
                </thead>
               
                <tbody>
                    @php 
                        $sum = 0;
                    @endphp
                    
                    @foreach($data as $item)
                    <tr class="border-bottom">
                        <td class="text-center">
                            <img src="{{url('')}}/products/{{$item->product_image}}" class="img-fluid">
                        </td>
                        <td class="text-center pt-4"><p class="mb-0 text-capitalize">{{$item->product_name}}</p></td>

                        <td class="text-center pt-4">
                            <div class="d-flex justify-content-center">
                                <div>
                                    <input type="number" class="form-control form-control-sm rounded-0 shadow-none" name="quantity" min="1" value="{{$item->quantity}}" disabled />
                                </div>
                                <div class="mx-1">
                                    <!-- Increment -->
                                    <form action="{{route('account.cart.quantity.increment')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
                                        <input type="hidden" name="product_id"  value="{{$item->product_id}}">
                                        <button type="submit" class="btn btn-sm px-2 py-1 rounded-0 shadow-none text-white"><i class="fas fa-plus"></i></button>
                                    </form>
                                </div>
                                @if($item->quantity > 1)
                                <div>
                                    <!-- Decrement -->
                                    <form action="{{route('account.cart.quantity.decrement')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
                                        <input type="hidden" name="product_id"  value="{{$item->product_id}}">
                                        <button type="submit" class="btn btn-sm px-2 py-1 rounded-0 shadow-none text-white"><i class="fas fa-minus"></i></button>
                                    </form>
                                    
                                </div>
                                @endif
                            </div>
                        </td>

                        <td class="text-center pt-4"><p class="mb-0">{{$item->product_price}} tk</p></td>
                        <td class="text-center pt-4">
                            <p class="mb-0">
                            @php 
                                $sum = $sum + $item->quantity * $item->product_price;
                            @endphp
                                {{$item->quantity * $item->product_price}}
                            tk</p>
                        </td>
                        <td class="text-center pt-4">
                            <form action="{{route('account.cart.destroy',$item->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn bg-white shadow-none px-3 py-2"><i class="fas fa-times text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="text-right">
                <h6 class="mb-3">Total: {{$sum}} tk</h6>
                <a href="{{route('account.cart.checkout')}}" class="btn text-white shadow-none">Check Out</a>
            </div>
        
        </div>
        @else
            <div class="col-12 py-5 text-center">
                <div class="card rounded-0 shadow-none border-0">
                    <div class="card-body">
                        <img src="{{url('')}}/website/static/empty-cart.png" class="img-fluid mb-4 empty-cart-img">
                        <h5 class="hot-text">Your Shopping Cart in empty !!</h5>
                    </div>
                </div>
            </div>
        @endif


    </div>
</div>
@endsection