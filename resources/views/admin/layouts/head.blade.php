<title>
    @yield('title',  setting('site_title'))

</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/fontawesome-free/css/all.min.css')}}">
  <link href="{{ URL::asset('assets/css/plugins/fontawesome-free/css/fontawesome.min.css')}}" rel="stylesheet" />
  <link href="{{ URL::asset('assets/css/plugins/fontawesome-free/css/brands.min.css')}}" rel="stylesheet" />
  <link href="{{ URL::asset('assets/css/plugins/fontawesome-free/css/solid.min.css')}}" rel="stylesheet" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap4-toggle.min.css') }}">

  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/cust.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets') .'/'. config('setting_var.images.favicon')}}">
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/toastr/toastr.min.css') }}">
    @inject('fonts', 'App\Models\fonts')
    <?= !empty($fonts->whereIsDefault(1)->first()->font_url) ? $fonts->whereIsDefault(1)->first()->font_url : ''; ?>
    <style>body { <?php echo $fonts->whereIsDefault(1)->first()->font_family; ;
        ?> }</style>



  @livewireStyles
  @stack('csslive')
  @yield('css')

{{-- <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/rtl.css') }}"> --}}
