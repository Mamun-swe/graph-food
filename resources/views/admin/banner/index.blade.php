@extends('layouts.app')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-3">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Banners</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.banner.create')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <table class="table table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <td><p class="mb-0 text-dark"><b>ID</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Image</b></p></td>
                        <td><p class="mb-0 text-dark"><b>Title</b></p></td>
                        <td><p class="mb-0 text-dark"><b>Description</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Action</b></p></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($banners as $banner)
                    <tr>
                        <td><p class="mb-0">{{$banner->id}}</p></td>
                        <td><img src="{{url('')}}/banners/{{$banner->banner_image}}" class="img-fluid product-img"></td>
                        <td><p class="mb-0">{{$banner->banner_title}}</p></td>
                        <td><p class="mb-0">{{$banner->banner_description}}</p></td>
                        <td class="text-center">
                            <form action="{{route('admin.banner.destroy',$banner->id)}}" method="post"
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



    </div>
</div>

@endsection
