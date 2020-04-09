

@if(Auth::User()->admin == 0)
    <script>window.location = "/shop/account/profile";</script>
@endif


@if(Session::has('status'))
<div style="text-align: center; padding-top: 20px;"></div>
    <h1 class="text-dark mb-0">Access denied, You have not permission.</h1>
    <a href="{{route('home')}}">Back to home</a>
@endif

