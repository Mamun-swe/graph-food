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
                    <h4 class="mb-4"><b>Login</b></h4>
                    @if(Session::has('error'))
                    <p class="text-danger">{{Session::get('error')}}</p>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                        </div>

                        <div class="form-group">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block">{{ __('Login') }}</button>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('reset') }}">{{ __('Forgot Your Password?') }}</a>
                            <br>
                            <a href="{{ route('register') }}">Have no account ?</a>
                        </div>
                    </form>
                </div>
            </div>
      
    </div>
</div>
@endsection
