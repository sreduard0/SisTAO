@php
use App\Classes\Tools;
$tools = new Tools();
@endphp
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    {{-- Posto/Graduação          Nome de Guerra --}}
    <title>Perfil - {{ $user_data->rank->rankAbbreviation }} {{ $user_data->professionalName }}</title>


    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

<body class=" dark-mode hold-transition sidebar-mini layout-fixed " onselectstart='return false'>
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
                <img src="img/logo.png" alt="SisTAO logo" class="brand-image">
                <span class="brand-text "><strong>SisTAO</strong> </span>
            </div>


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
                    <div class="image">
                        <img src="{{ $user_data->photoUrl }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        {{-- Posto/Graduação          Nome de Guerra --}}
                        <a href="{{ route('profile') }}">
                            {{ $user_data->rank->rankAbbreviation }}
                            {{ $user_data->professionalName }}
                        </a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy" data-widget="treeview"
                        role="menu" data-accordion="false">
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
                                    <a href="{{ route('edit_profile') }}" class="nav-link">
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
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1445px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a class=" d-inline-block nav-link " data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
                            <h1 class="d-inline-block m-0">
                                Perfil
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
                        <div class="widget-user-header text-white"
                            style="background: url('img/photo1.png') center center;">
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ $user_data->photoUrl }}" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="description-block">
                                <h3 class="widget-user-desc text-center"> {{ $user_data->rank->rankAbbreviation }}
                                    {{ $user_data->professionalName }}</h3>
                                <h4 class="widget-user-username text-center text-muted">
                                    {{ $user_data->departament->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title card-title-background "> <i class="fas fa-user mr-1"></i>
                                            Informações basicas</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="  float-l col-md-6">
                                                <strong> Nome completo</strong>

                                                <p class="text-muted">
                                                    {{ $user_data->name }}
                                                </p>

                                                <hr>

                                                <strong> Militar</strong>

                                                <p class="text-muted">
                                                    {{ $user_data->rank->rankAbbreviation }}
                                                    {{ $user_data->militaryId }}
                                                    {{ $user_data->professionalName }}
                                                </p>

                                                <hr>

                                                <strong>CIA</strong>

                                                <p class="text-muted">
                                                    {{ $user_data->company->name }}
                                                </p>


                                            </div>
                                            <div class=" float-r col-md-6">
                                                <strong>CPF</strong>

                                                <p class="text-muted">
                                                    {{ $tools->mask('###.###.###-##', $user_data->cpf) }}
                                                </p>

                                                <hr>

                                                <strong>Dada de nascimento</strong>

                                                <p class="text-muted">
                                                    {{ date('d/m/Y', strtotime($user_data->born_at)) }}
                                                </p>

                                                <hr>

                                                <strong>Filiação</strong>

                                                <p class="text-muted">
                                                    <strong>MÃE:</strong> {{ $user_data->motherName }} <br>
                                                    <strong>PAI:</strong> {{ $user_data->fatherName }}
                                                </p>


                                            </div>




                                        </div>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <h3 class="card-title card-title-background"> <i
                                                class="fas fa-map-marker-alt mr-1"></i> Endereço</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class=" float-l col-md-6">
                                            <strong>Logradouro</strong>

                                            <p class="text-muted">
                                                {{ $user_data->street . ', N°' . $user_data->house_number }}
                                            </p>

                                            <hr>

                                            <strong> Bairro</strong>

                                            <p class="text-muted">
                                                {{ $user_data->district }}
                                            </p>

                                        </div>
                                        <div class=" float-r col-md-6">

                                            <strong>Cidade</strong>

                                            <p class="text-muted">
                                                {{ $user_data->city->name . ', ' . $user_data->city->state }}
                                            </p>

                                            <hr>

                                            <strong>CEP</strong>

                                            <p class="text-muted">
                                                {{ $user_data->cep }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title card-title-background"> <i
                                                class="fas fa-id-badge mr-1"></i> Contato</h3>
                                    </div>

                                    <div class="card-body">

                                        <div class=" float-l col-md-6">
                                            <strong>Telefone</strong>

                                            <p class="text-muted">
                                                <strong>Fone 1</strong>
                                                {{ $tools->mask('(##) # ####-####', $user_data->phone1) }}<br>
                                                <strong>Fone 2</strong>
                                                {{ $tools->mask('(##) # ####-####', $user_data->phone2) }}
                                            </p>

                                        </div>
                                        <div class=" float-r col-md-6">

                                            <strong>E-mail</strong>

                                            <p class="text-muted">
                                                {{ $user_data->email }}
                                            </p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
        </div>
        <footer class=" align-items-center main-footer">
            <footer>
                <div class="text-center">
                    &copy;SisTAO 2021 (v1.0) <br>
                    Desenvolvido por: Sgt Souza Lima e Cb Eduardo
                </div>
            </footer>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/main.js"></script>
    <!-- Page specific script -->
    <script src="js/autocomplete-cep.js"></script>
    <script src="js/inputmask.js"></script>


</body>

</html>
