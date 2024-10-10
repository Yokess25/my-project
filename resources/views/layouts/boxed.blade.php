<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Practice Project</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{asset('asset/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('asset/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('asset/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .btnn {
        margin-top: 1rem;  background-color: #3b82f6; color: white; font-weight: bold; padding-top: 0.5rem; padding-bottom: 0.5rem; padding-left: 1rem; padding-right: 1rem; border-radius: 0.375rem;"
      }
    </style>
  </head>
  <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
  <body class="skin-blue layout-boxed sidebar-mini">
    <!-- Site wrapper -->
    <div>     
        <!-- Logo -->
        @include('layouts.top')
      <!-- =============================================== -->
      <!-- Left side column. contains the sidebar -->
        @include('layouts.left')
      <!-- =============================================== -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 916px;">
        
        <!-- Main content -->
        
          @yield('content')
        
      </div><!-- /.content-wrapper -->
      <!-- Control Sidebar -->      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('asset/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('asset/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="{{asset('asset/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{asset('asset/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('asset/dist/js/app.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('asset/dist/js/demo.js') }}" type="text/javascript"></script>
  </body>
</html>