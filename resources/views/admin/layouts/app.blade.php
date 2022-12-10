<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Starter</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{url('admins')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('admins')}}/css/bootstrap-rtl.min.css">
    <!-- AdminLTE.min -->
    <link rel="stylesheet" href="{{url('admins')}}/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{url('admins')}}/css/AdminLTE-rtl.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('admins')}}/dist/css/AdminLTE.min.css">
    <!-- my style -->
    <link rel="stylesheet" href="{{url('admins')}}/css/style.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{url('admins')}}/dist/css/skins/skin-blue.min.css">
    <!--ckeditor css-->
    {{-- <link rel="stylesheet" href="{{asset('admins/plugins/ckeditor/content.css')}}"> --}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <!--ckeditor-->
      {{-- <script src="{{asset('admins/plugins/ckeditor/config.js')}}"></script>
      <script src="{{asset('admins/plugins/ckeditor/ckeditor.js')}}"></script>
      <script src="{{asset('admins/plugins/ckeditor/style.js')}}"></script> --}}
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- Main Header -->
      @yield('header')
      <!-- Left side column. contains the logo and sidebar -->
      @yield('side-bar')

      <!-- Content Wrapper. Contains page content -->
      @yield('content-wrapper')
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      @yield('main-footer')

      <!-- Control Sidebar -->
      @yield('control-sidebar')
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    {{-- @include('sweetalert::alert') --}}
    <!-- jQuery 2.1.4 -->
    <script src="{{url('admins')}}/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{url('admins')}}/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('admins')}}/dist/js/app.min.js"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    {{-- <script>
          CKEDITOR.replace('ckeditor');
    </script> --}}

<script src="{{asset('/admins/js/MyFunctions.js')}}" type="text/javascript"></script>
  </body>
</html>
