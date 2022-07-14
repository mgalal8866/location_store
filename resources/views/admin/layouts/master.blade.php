<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('admin.layouts.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/location.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

    @include('admin.layouts.main_headerbar')
    @include('admin.layouts.main_sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> @yield('page','Dashbord')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="@yield('link', '/admin/dashborad')"> @yield('page1','Dashborad')</a></li>
              <li class="breadcrumb-item active"> @yield('page2','Home')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <amp-ad width="100vw" height="320"
     type="adsense"
     data-ad-client="ca-pub-9908015336564777"
     data-ad-slot="1472048860"
     data-auto-format="rspv"
     data-full-width="">
  <div overflow=""></div>
</amp-ad>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9908015336564777"
     crossorigin="anonymous"></script>
<!-- sasas -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9908015336564777"
     data-ad-slot="1472048860"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
    @yield('content')
        @isset($slot)
        {{$slot}}
        @endisset
    </section>

    <!-- /.content -->
  </div>


    @include('admin.layouts.footer')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.layouts.footer_scripts')
</body>
</html>
