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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>

                        <div class="form-group">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>


                        <div class="form-group">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
