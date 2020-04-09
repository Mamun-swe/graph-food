@extends('layouts.app')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 mb-3">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <h5 class="mb-0 mt-2 text-dark"><b>Orders</b></h5>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="text-center"><p class="mb-0"><b>Order Id</b></p></td>
                        <td><p class="mb-0"><b>Name</b></p></td>
                        <td><p class="mb-0"><b>Phone</b></p></td>
                        <td><p class="mb-0"><b>Location</b></p></td>
                        <td class="text-center"><p class="mb-0"><b>Action</b></p></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="text-center"><p class="mb-0">{{$order->id}}</p></td>
                        <td><p class="mb-0 text-capitalize">{{$order->user_name}}</p></td>
                        <td><p class="mb-0">0{{$order->phone}}</p></td>
                        <td><p class="mb-0 text-capitalize">{{$order->location}}</p></td>
                        <td class="text-center">
                            <a href="{{route('admin.order.show',  ['id' => $order->id, 'uid' => $order->user_id])}}" class="btn btn-info py-1 px-3 rounded-0 text-white shadow-sm">View</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection

