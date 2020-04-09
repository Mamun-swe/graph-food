@extends('layouts.app')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-3">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Bangla Food</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.bangla.create')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <table class="table table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <td><p class="mb-0 text-dark"><b>SL</b></p></td>
                        <td><p class="mb-0 text-dark"><b>Category</b></p></td>
                        <td><p class="mb-0 text-dark"><b>Product name</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Image</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Total Items</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Items</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Price</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Status</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Action</b></p></td>
                    </tr>
                </thead>
                <tbody>

                @foreach($data as $key => $product)
                    <tr>
                        <td><p class="mb-0 text-dark"><b>{{$key + 1}}</b></p></td>
                        <td><p class="mb-0 text-dark text-capitalize">{{$product->category}}</p></td>
                        <td><p class="mb-0 text-dark text-capitalize">{{$product->product_name}}</p></td>
                        <td class="text-center">
                            <img src="{{url('')}}/products/{{$product->product_image}}" class="img-fluid product-img">
                        </td>
                        <td><p class="mb-0 text-dark text-center text-capitalize">{{$product->total_item}} Pcs.</p></td>
                        <td><p class="mb-0 text-dark text-center text-capitalize">{{$product->item_details}}</p></td>
                        <td><p class="mb-0 text-dark text-center text-capitalize">{{$product->product_price}} tk</p></td>
                        
                        <td class="text-center">
                            @if($product->product_status == 1)
                                <form action="{{route('admin.bangla.status', $product->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="0" name="new_status">
                                    <button type="submit" class="btn btn-sm shadow-none btn-success text-white py-0">Running</button>
                                </form>
                            @elseif($product->product_status == 0)
                                <form action="{{route('admin.bangla.status', $product->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" value="1" name="new_status">
                                    <button type="submit" class="btn btn-sm shadow-none btn-warning text-white py-0">Stopped</button>
                                </form>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('admin.bangla.edit', $product->id)}}" class="btn btn-light text-info"><i class="fas fa-pen"></i></a>
                            
                            <form action="{{route('admin.bangla.destroy',$product->id)}}" method="post"
                                onsubmit="return confirm('Are you sure ?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-light text-danger shadow-none">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach



                </tbody>
            </table>

        </div>

        <div class="col-12 text-center mb-4">
            {{ $data->links() }}
        </div>
    </div>
</div>

@endsection