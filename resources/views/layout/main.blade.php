<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="10"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title></title>

</head>
<body data-bs-theme="dark">
      @include('layout.topbar')


      <div class="container-fluid">
      <h4>@yield('title')</h4>  

   


      @yield('content')
      </div>

      @include('layout.footer')
</body>
</html>


