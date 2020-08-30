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
                    <h4 class="mb-4"><b>Registration</b></h4>
                    @if(Session::has('success'))
                    <p class="text-success">{{Session::get('success')}}</p>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf



                        <div class="form-group">
                            @if($errors->has('name'))
                                <label class="text-danger" for="name">{{ __('Name is required') }}</label>
                            @else 
                                <label for="name">{{ __('Name') }}</label>
                            @endif
                            
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        </div>



                        <div class="form-group">
                            @if($errors->has('email'))
                                <label class="text-danger" for="email">{{ $errors->first('email') }}</label>
                            @else 
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            @endif
                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                        </div>




                        <div class="form-group">
                            @if($errors->has('password'))
                            <label class="text-danger" for="password">{{ $errors->first('password') }}</label>
                            @else 
                            <label for="password">{{ __('Password') }}</label>
                            @endif
                            
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        </div>



                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-block">{{ __('Register') }}</button>
                        </div>


                        <div class="text-right">
                            <a href="{{ route('login') }}">Go to login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>
@endsection
