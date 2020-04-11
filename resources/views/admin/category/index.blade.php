@extends('layouts.app')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-4">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Categories</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.category.create')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-plus"></i></a>
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
                        <td><p class="mb-0 text-dark"><b>Category Name</b></p></td>
                        <td class="text-center"><p class="mb-0 text-dark"><b>Action</b></p></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $key => $cat)
                    <tr>
                        <td><p class="mb-0 text-dark"><b>{{$key + 1}}</b></p></td>
                        <td><p class="mb-0 text-dark text-capitalize">{{$cat->cat_name}}</p></td>
                        <td class="text-center">
                            <a href="{{route('admin.category.edit', $cat->id)}}" class="btn btn-light text-info"><i class="fas fa-pen"></i></a>
                            <form action="{{route('admin.category.destroy',$cat->id)}}" method="post"
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
