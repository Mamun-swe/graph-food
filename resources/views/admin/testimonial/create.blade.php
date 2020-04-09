@extends('layouts.app')
@section('content')

<div class="container-fluid px-lg-4">
    <div class="row">

        <div class="col-12 my-4">
            <div class="card rounded-0 border-0 shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 mt-2 text-dark"><b>Make new testimonial</b></h5>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('admin.testimonial.index')}}" class="btn btn-info rounded-0 shadow-none text-white"><i class="fas fa-chevron-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-12 col-lg-6 m-auto">
                    @if(Session::has('success'))
                        <p class="text-success mb-0">{{Session::get('success')}}</p>
                    @endif
                    <form action="{{route('admin.testimonial.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Name -->
                        <div class="form-group mb-4">
                            @if($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @else
                                <small class="text-muted">Name</small>
                            @endif
                            <input type="text" class="form-control form-control-lg rounded-0 shadow-none" name="name" placeholder="Enter name">
                        </div>

                        <!-- Description -->
                        <div class="form-group mb-4">
                            @if($errors->has('description'))
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            @else
                                <small class="text-muted">Description</small>
                            @endif
                            <textarea class="form-control form-control-lg rounded-0 shadow-none" name="description" rows="4"></textarea>
                        </div>

                        <!-- image -->
                        <div class="form-group mb-4">
                            @if($errors->has('image'))
                                <small class="text-danger">{{ $errors->first('image') }}</small>
                            @else
                                <small class="text-muted">image</small>
                            @endif
                            <br>
                            <input type="file" name="image">
                        </div>

                        <button type="submit" class="btn btn-lg btn-primary rounded-0 shadow-none float-right text-white px-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>

@endsection
