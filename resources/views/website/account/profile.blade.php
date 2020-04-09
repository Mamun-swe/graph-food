@extends('layouts.website')
@section('content')

<div class="container">
    <div class="row pt-3 pt-lg-5 pb-4">
        <div class="col-12">
            <div class="card rounded-0 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-md-flex">
                        <div>
                            <h5 class="mb-2 text-capitalize"><i class="fas fa-user-tie mr-2"></i>{{Auth::User()->name}}</h5>
                            <p class="mb-0"><i class="fas fa-envelope mr-2"></i>{{Auth::User()->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card rounded-0 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="hot-text">Update Info</h5>
                    @if(Session::has('success'))
                        <p class="text-success mb-0">{{Session::get('success')}}</p>
                    @endif
                    <form action="{{route('account.profile.update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <!-- Name -->
                                <div class="form-group mb-4">
                                    @if($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @else
                                    <small>Name</small>
                                    @endif
                                    <input type="text" class="form-control rounded-0 shadow-none" name="name" value="{{Auth::User()->name}}">
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <!-- Password -->
                                <div class="form-group mb-4">
                                    @if($errors->has('password'))
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                    @else
                                    <small>New Password</small>
                                    @endif
                                    <input type="password" name="password" class="form-control rounded-0 shadow-none">
                                </div>
                            </div>

                        </div>
                        
                        <button type="submit" class="orange-btn w-100">Update</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection