<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Mini Library &mdash; @yield('title')</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- General CSS Files -->
  <link rel="shortcut icon" href="{{asset('images/books.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/components.css')}}">

  <!-- Custom style CSS -->
  @yield('css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        @include('layouts.navbar')
      </nav>
      <div class="main-sidebar sidebar-style-2">
        @include('layouts.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>
          </div>

          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div><a href="https://github.com/k-ardliyan">k-ardliyan</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  @include('sweetalert::alert')

  <!-- Template JS File -->
  <script src="{{asset('js/scripts.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  @stack('scripts')
</body>
</html>
