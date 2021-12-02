<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="icon" href="<%= BASE_URL %>favicon.ico"> -->

    <title>Spa Challenge</title>
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset(mix('css/main.css')) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset(mix('css/iconfont.css')) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset(mix('css/material-icons/material-icons.css')) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset(mix('css/vuesax.css')) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset(mix('css/prism-tomorrow.css')) }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}"> --}}
    <link rel="stylesheet" href="css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
  </head>
  <body>
    <div id="app">
      <router-view></router-view>
    </div>

    <!-- <script src="js/app.js"></script> -->
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="/js/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
