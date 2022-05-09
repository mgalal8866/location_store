<title>
    @yield('title', env('APP_NAME'))

</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/summernote/summernote-bs4.min.css') }}">
  {{-- <link href="https://fonts.googleapis.com/css?family=Arvo:400,700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
@inject('fonts', 'App\Models\fonts')
{{ $fonts->font_url}}
{{ fonts::find(0)->font_url }}
{{-- {{$fonts->font_url}} --}}
{{-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600&display=swap" rel="stylesheet">  --}}
{{-- <style>body { {{$fonts->font_family}} }</style> --}}
  @livewireStyles
  @stack('csslive')
  @yield('css')

{{-- <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/rtl.css') }}"> --}}
