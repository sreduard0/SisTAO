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
                            <a href="#" class="nav-link">
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a class=" d-inline-block nav-link " data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
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
                                <h5 class="widget-user-username text-center">{{ $user_data->departament->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#info"
                                                    data-toggle="tab">Informações basicas</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#address"
                                                    data-toggle="tab">Endereço</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact"
                                                    data-toggle="tab">Contato</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#settings"
                                                    data-toggle="tab">Configuraçoes</a></li>

                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <div class="tab-content m-rl-80">
                                            <div class="active tab-pane" id="info">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="pg">Posto/Grad</label>
                                                        <select class="form-control" name="pg" id="pg">
                                                            <option value="">Selecione</option>
                                                            @foreach ($all_ranks as $rank)
                                                                <option @if ($user_data->rank_id == $rank->id) selected="selected" @endif value="{{ $rank->id }}">
                                                                    {{ $rank->rankAbbreviation }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label for="militaryId">N°</label>
                                                        <input type="text" class="form-control" id="militaryId"
                                                            placeholder="N°" value="{{ $user_data->militaryId }}">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="professionalname">Nome de gerra</label>
                                                        <input type="text" class="form-control" id="professionalname"
                                                            placeholder="Digite seu nome de guerra"
                                                            value="{{ $user_data->professionalName }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="company_id">CIA</label>
                                                        <select name="company_id" id="company_id" class="form-control">
                                                            <option value="">Selecione</option>
                                                            @foreach ($all_company as $company)
                                                                <option @if ($user_data->company_id == $company->id) selected="selected" @endif value="{{ $company->id }}">
                                                                    {{ $company->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="form-group col">
                                                        <label for="name">Nome completo</label>
                                                        <input type="text" class="form-control" id="name"
                                                            placeholder="Digite seu nome completo"
                                                            value="{{ $user_data->name }}">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="cpf">CPF</label>
                                                        <input type="text" class="form-control"
                                                            data-inputmask="'mask': ['999.999.999-99']" data-mask=""
                                                            inputmode="text" name="cpf" placeholder="___.___.___-__"
                                                            value="{{ $user_data->cpf }}">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Data de nascimento</label>
                                                        <div class="input-group date" id="born_at"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input"
                                                                data-target="#born_at"
                                                                value="{{ date('d/m/Y', strtotime($user_data->born_at)) }}">
                                                            <div class="input-group-append" data-target="#born_at"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="mother_name">Nome da mãe</label>
                                                        <input type="text" name="mother_name" class="form-control"
                                                            placeholder="Nome da mãe"
                                                            value="{{ $user_data->motherName }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="father_name">Nome do pai</label>
                                                        <input type="text" name="father_name" class="form-control"
                                                            placeholder="Nome do pai"
                                                            value="{{ $user_data->fatherName }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="address">
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <label for="street">Logradouro</label>
                                                        <input type="text" class="form-control" id="street"
                                                            name="street" placeholder="Logradouro"
                                                            value="{{ $user_data->street }}">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label for="house_number">Nº</label>
                                                        <input type="text" class="form-control" id="house_number"
                                                            name="house_number" placeholder="Nº"
                                                            value="{{ $user_data->house_number }}">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="cpf">CEP</label>
                                                        <input type="text" class="form-control"
                                                            data-inputmask="'mask': ['99999-999']" data-mask=""
                                                            inputmode="text" name="cep" placeholder="_______-__"
                                                            value="{{ $user_data->cep }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="district">Bairro</label>
                                                        <input type="text" id="district" name="district"
                                                            class="form-control" placeholder="Bairro"
                                                            value="{{ $user_data->district }}">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="city">Cidade</label>
                                                        <input type="text" class="form-control" id="city" name="city"
                                                            placeholder="Cidade"
                                                            value="{{ $user_data->city->name }}">
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label for="state">UF</label>
                                                        <input type="text" class="form-control" id="state" name="state"
                                                            disabled placeholder="UF"
                                                            value="{{ $user_data->city->state }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="contact">
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <label for="phone1">Telefone 1</label>
                                                        <input type="text" class="form-control"
                                                            data-inputmask="'mask': ['(99) 9 9999-9999']"
                                                            inputmode="text" data-mask="" id="phone1" name="phone1"
                                                            placeholder="Telefone" value="{{ $user_data->phone1 }}">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="phone2">Telefone 2</label>
                                                        <input type="text" class="form-control"
                                                            data-inputmask="'mask': ['(99) 9 9999-9999']"
                                                            inputmode="text" data-mask="" id="phone2" name="phone2"
                                                            placeholder="Telefone" value="{{ $user_data->phone2 }}">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <label for="email">E-mail</label>
                                                        <input type="text" class="form-control" id="email" name="email"
                                                            placeholder="E-mail" value="{{ $user_data->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="settings">

                                            </div>
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-3">

                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Visão geral</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fas fa-user mr-1"></i> Informações basicas</strong>

                                        <ul class="text-muted">
                                            <li class="row">NOME: {{ $user_data->name }}</li>
                                            <li class="row">MILITAR:
                                                {{ $user_data->rank->rankAbbreviation }}
                                                {{ $user_data->militaryId }}
                                                {{ $user_data->professionalName }}
                                            </li>
                                            <li class="row">CIA: {{ $user_data->company->name }}</li>
                                            <li class="row">NASCIDO:
                                                {{ date('d/m/Y', strtotime($user_data->born_at)) }}</li>
                                        </ul>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Endereço</strong>

                                        <ul class="text-muted">
                                            <li class="row">LOGRADOURO: {{ $user_data->street }}</li>
                                            <li class="row">BAIRRO: {{ $user_data->district }}</li>
                                            <li class="row">CIDADE: {{ $user_data->city->name }}</li>
                                            <li class="row">ESTADO: {{ $user_data->city->state }}</li>
                                        </ul>

                                        <hr>

                                        <strong><i class="fas fa-id-badge mr-1"></i> Contato</strong>

                                        <ul class="text-muted">
                                            <li class="row">FONE 1:
                                                {{ $tools->mask('(##) # ####-####', $user_data->phone1) }}</li>
                                            <li class="row">FONE 2:
                                                {{ $tools->mask('(##) # ####-####', $user_data->phone2) }}
                                            </li>
                                            <li class="row">E-mail: {{ $user_data->email }}</li>
                                        </ul>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->

                </section>

                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
        </div>
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
