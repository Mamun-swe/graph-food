  
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container py-3">
          <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{url('')}}/website/static/logo.png" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
              
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                  <div class="dropdown-menu rounded-0 border-0 py-0" aria-labelledby="navbarDropdown">
                  <?php 
                    use App\Models\Category;
                    $categories = Category::all();
                      foreach($categories as $category){
                  ?>
                    <a class="dropdown-item text-capitalize" href="{{route('category', $category->id)}}">{{$category->cat_name}}</a>
                  <?php } ?>
                  </div>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{route('bangla')}}"> Bangla Items </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{route('service')}}"> Services </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('contact')}}">Contact us</a>
                </li>
                

                @if(Auth::User() && Auth::User()->admin == 0)
                <li class="nav-item">
                  <a class="nav-link" href="{{route('account.cart')}}">Cart</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::User()->name}}</a>
                  <div class="dropdown-menu rounded-0 border-0 py-0" aria-labelledby="navbarDropdown2">
                    <a class="dropdown-item text-capitalize" href="{{route('account.profile')}}">Edit Profile</a>
                    <a class="dropdown-item text-capitalize" href="{{route('account.history')}}">History</a>
                    <a class="dropdown-item text-capitalize" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                  </div>
                </li>
                @else
                <li class="nav-item">
                  <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                @endif


              </ul>
                <!-- Search modal trigger -->
              <a class="btn shadow-none my-2 my-sm-0 nav_search-btn" id="searchModal" href="#animatedModal"></a>
            </div>
          </div>
        </nav>
      </div>
    </header>


<!-- Search -->
<div id="animatedModal">
  <div class="close-animatedModal text-center py-4 py-lg-5"> 
      &times;
  </div>
  <div class="modal-content border-0">

    <div class="flex-center flex-column">
      <div class="card rounded-0 border-0">
        <div class="card-body">

            <form action="{{route('search')}}" method="post">
              @csrf
              <div class="input-group">
                <input type="text" class="form-control form-control-lg rounded-0 shadow-none border-left-0 border-top-0 border-right-0 pl-2" placeholder="Search for ..." name="search_data" required>
                <div class="input-group-prepend">
                  <div class="input-group-text p-0 bg-white border-0">
                    <button type="submit" class="btn shadow-none px-3 py-2"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </form>

        </div>
      </div>
    </div>

  </div>
</div>

