<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">


  <link href="{{ asset('website/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('website/css/custom.css') }}" rel="stylesheet" />
  <link href="{{ asset('website/css/responsive.css') }}" rel="stylesheet" />
  <link href="{{ asset('website/css/notifIt.css') }}" rel="stylesheet" />
  <link href="{{ asset('website/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="{{ asset('website/js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('website/js/bootstrap.js') }}"></script>
  <script type="text/javascript" src="{{ asset('website/js/animatedModal.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('website/js/notifIt.js') }}"></script>
</head>
<body>
    <div id="app">
        @include('website.header') 
        @yield('content')
        @include('website.footer') 
    </div>


    

  <script>
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 23.875607,
          lng: 90.324318
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 23.875607,
          lng: 90.324318
        },
        map: map,
        icon: image
      });
    }
    // Search Modal
    $("#searchModal").animatedModal({
      color: '#fff',
      zIndexIn: '999999',
    });
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
    </body>
</html>


