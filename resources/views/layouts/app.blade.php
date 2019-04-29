<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->


    @include('included_styles')

</head>
<body>
  <div class="">

    @include('inc.navbar')

      @yield('content')

    @include('inc.footer')

  </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.fittext.js"></script>
  <script src="js/typed.js"></script>
  <script src="js/particles.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/jquery.parallax.js"></script>
  <script src="js/smoothscroll.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>
