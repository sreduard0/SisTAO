<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
                  {{--      Posto/Graduação          Nome de Guerra --}}
  <title>Perfil -  {{ $rank }} {{ $professionalname }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.css">
  <!-- Utils -->
  <link rel="stylesheet" href="css/util.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="dark-mode hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/logo.png" height="70" width="60">
    <span class="fs-30"><strong>SisTAO</strong> </span>
  </div>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="img/logo.png" alt="SisTAO logo" class="brand-image" >
      <span class="brand-text "><strong>SisTAO</strong> </span>
  </div>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
         {{--      Posto/Graduação          Nome de Guerra --}}
        <a href="#">{{ $rank }} {{ $professionalname }}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Home
                    </p>
                </a>
            </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Perfil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('edit_profile') }}" class="nav-link active">
                    <i class="nav-icon fas fa-user-edit"></i>
                <p>Editar perfil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-lock"></i>
                  <p>Alterar senha</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Sair</p>
                </a>
            </li>
            </ul>
          </li>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a class=" d-inline-block nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            <h1 class="d-inline-block m-0">
                Editar Perfil
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white" style="background: url('img/photo1.png') center center;">
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="img/user3-128x128.jpg" alt="User Avatar">
                </div>
                <div class="card-footer">
                      <div class="description-block">
                        <h3 class="widget-user-desc text-center">{{ $rank }} {{ $professionalname }}</h3>
                        <h5 class="widget-user-username text-center">Web Designer</h5>
                    </div>
                </div>
              </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

  <footer class=" align-items-center main-footer">
    <footer>
        <div class="text-center">
            &copy;SisTAO 2021 (v1.0) <br>
            Desenvolvido por: Sgt Souza Lima e Cb Eduardo
        </div>
    </footer>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
</body>
</html>
