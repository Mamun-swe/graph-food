@extends('layouts.website')
@section('content')


<div class="container history">
    <div class="row">
        <div class="col-12 my-4">
            <div class="card border-0 rounded-0 shadow-sm">
                <div class="card-body">
                <h5 class="mb-0 hot-text">History</h5>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <td class="text-center"><p class="mb-0"><b>SL</b></p></td>
                        <td><p class="mb-0"><b>Name</b></p></td>
                        <td class="text-center"><p class="mb-0"><b>Quantity</b></p></td>
                        <td class="text-center"><p class="mb-0"><b>Price</b></p></td>
                        <td class="text-center"><p class="mb-0"><b>Date</b></p></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $key => $item)
                    <tr>
                        <td class="text-center"><p class="mb-0">{{$key + 1}}</p></td>
                        <td><p class="mb-0 text-capitalize">{{$item->product_name}}</p></td>
                        <td class="text-center"><p class="mb-0">{{$item->quantity}}</p></td>
                        <td class="text-center"><p class="mb-0">{{$item->quantity * $item->product_price}}</p></td>
                        <td class="text-center"><p class="mb-0">{{ date('d.m.Y', strtotime($item->created_at)) }}</p></td>  
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-12 text-center">
            {{ $data->links() }}
        </div>

    </div>
</div>


@endsection