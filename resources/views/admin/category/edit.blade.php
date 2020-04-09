@extends('layouts.app')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-4">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Edit category</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.category.index')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="row">

            @if($data)
                <div class="col-12 col-lg-6 m-auto">
                    @if(Session::has('success'))
                        <p class="text-success mb-0">{{Session::get('success')}}</p>
                    @endif
                    <form action="{{route('admin.category.update', $data->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4">
                            @if($errors->has('cat_name'))
                                <small class="text-danger">{{ $errors->first('cat_name') }}</small>
                            @else
                                <small class="text-muted">Category name</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="cat_name" value="{{$data->cat_name}}">
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary rounded-0 shadow-none float-right text-white px-5">Update</button>
                    </form>
                </div>
            @else

                <div class="col-12">
                    <div class="card rounded-0 shadow-none border-0 text-center">
                        <div class="card-body">
                            <h5 class="mb-0 text-danger">Opps !! Category not found .</h5>
                        </div>
                    </div>
                </div>
            @endif

            </div>
        </div>



    </div>
</div>

@endsection
