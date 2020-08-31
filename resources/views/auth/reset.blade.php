@extends('layouts.app')

@section('content')
<div class="auth">
    <div class="flex-center flex-column">

        <div class="card text-left border-0 shadow-none">
            <div class="card-header text-center py-4 border-0">
                <a href="{{route('home')}}">
                    <img src="{{url('')}}/website/static/logo.png" class="img-fluid mb-lg-4">
                </a>
            </div>

            <div class="card-body shadow-sm pb-5">
                <h4 class="mb-4"><b>Reset Password</b></h4>
                    @if(Session::has('success'))
                        <p class="text-success mb-0">{{Session::get('success')}}</p>
                    @elseif(Session::has('errorx'))
                        <p class="text-danger mb-0">{{Session::get('errorx')}}</p>
                    @endif
                <form action="{{route('reset')}}" method="post">
                    @csrf
                    <div class="form-group">
                        @if($errors->has('email'))
                            <p class="text-danger mb-0"><b>{{ $errors->first('email') }}</b></p>
                        @else
                            <p class="mb-0"><b>E-mail</b></p>
                        @endif
                        <input type="text" class="form-control" name="email" placeholder="example@gmail.com" required autofocus>
                    </div>

                    <div class="form-group mb-4">
                        @if($errors->has('password'))
                            <p class="text-danger mb-0"><b>{{ $errors->first('password') }}</b></p>
                        @else
                            <p class="mb-0"><b>Password</b></p>
                        @endif
                        <input type="password" class="form-control" name="password" placeholder="Enter new password" required autofocus>
                    </div>

                    <button type="submit" class="btn btn-block">Reset Password</button>
                    <div class="text-right mt-2">
                        <a href="{{route('login')}}">Back to login</a>
                    </div>

                </form>
            </div>
        </div>


    </div>
</div>
@endsection
