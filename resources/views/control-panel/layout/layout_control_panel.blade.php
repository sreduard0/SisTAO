@php
use App\Classes\Tools;
$tools = new Tools();
$user_data = $tools->user_data(session('user')['id']);
$login_requests = $tools->login_requests();
$profileType = session('SisTAO')['profileType'];
$theme = session('theme');
@endphp
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    {{-- Posto/Graduação          Nome de Guerra --}}
    <title>SisTAO - @yield('title')</title>
    <!-- Select2 -->
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    {{-- sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Utils -->
    {{-- <link rel="stylesheet" href="{{ asset('css/main.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <!-- Utils -->
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <script>
        setTimeout(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
            });
            var Errors = @json($errors->all());
            var Erro = @json(session('erro'));
            var Success = @json(session('success'));

            function msg_error(msg) {
                toastr.error(msg);
            }
            if (Errors) {
                Errors.forEach(msg_error);
            }
            if (Erro) {
                toastr.error(Erro);
            }
            if (Success) {
                Toast.fire({
                    icon: 'success',
                    title: '&nbsp&nbsp' + Success
                })
            }
        }, 1000);
    </script>
    {{-- scripts especificos --}}
    @yield('scripts')
</head>

<body class="@if ($theme == 1) dark-mode @endif sidebar-mini
    layout-fixed">
    <div id='loading'></div>

    <div class="wrapper">


        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('img/logo.png') }}" height="70" width="60">
            <span class="fs-30"><strong>SisTAO</strong> </span>
        </div>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-link">
                <img src="{{ asset('img/logo.png') }}" alt="SisTAO logo" class="brand-image">
                <span class="brand-text "><strong>SisTAO</strong> </span>
            </div>


            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset($user_data->photoUrl) }}" id="image_profile"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        {{-- Posto/Graduação          Nome de Guerra --}}
                        <a href="{{ route('my_profile') }}">{{ $user_data->rank->rankAbbreviation }}
                            {{ $user_data->professionalName }}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class='nav-link @yield('home')'>
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        @if ($profileType == 2)
                            <li class="nav-item @yield('menu_cp_open')">
                                <a href="#" class="nav-link @yield('cp')">
                                    <i class="nav-icon fas fa-address-card"></i>
                                    <p>
                                        Plano de chamada
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('callplan', ['company' => 1]) }}"
                                            class="nav-link @if (!empty($active) && $active == 1) active @endif">
                                            <i class="nav-icon fas fa-users"></i>
                                            <p>EM</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('callplan', ['company' => 2]) }}"
                                            class="nav-link  @if (!empty($active) && $active == 2) active @endif">
                                            <i class="nav-icon fas fa-users"></i>
                                            <p>CCSv</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('callplan', ['company' => 3]) }}"
                                            class="nav-link  @if (!empty($active) && $active == 3) active @endif">
                                            <i class="nav-icon fas fa-users"></i>
                                            <p>1º Cia </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('callplan', ['company' => 4]) }}"
                                            class="nav-link  @if (!empty($active) && $active == 4) active @endif">
                                            <i class="nav-icon fas fa-users"></i>
                                            <p>2º Cia</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('callplan', ['company' => 5]) }}"
                                            class="nav-link  @if (!empty($active) && $active == 5) active @endif">
                                            <i class="nav-icon fas fa-users"></i>
                                            <p>3º Cia</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if ($profileType == 1)
                            <li class="nav-item @yield('menu_adm_open')">
                                <a href="#" class="nav-link @yield('adm')">
                                    <i class="nav-icon fas fa-tools"></i>
                                    <p>
                                        Administrador
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('users_list') }}" class="nav-link  @yield('users')">
                                            <i class="nav-icon fas fa-users"></i>
                                            <p>Militares</p>
                                        </a>

                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('register_list') }}" class="nav-link  @yield('register')">
                                            <i class="nav-icon fas fa-user-plus"></i>
                                            <p>Solicitações de login</p>
                                            <span class="badge badge-success right">{{ $login_requests }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('app_list') }}" class="nav-link  @yield('apps')">
                                            <i class="nav-icon fas fa-th-list"></i>
                                            <p>Aplicações</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item @yield('menu_profile_open')">
                            <a href="#" class="nav-link @yield('profile') @yield('edit_profile')">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>
                                    Perfil
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('edit_my_profile') }}" class="nav-link  @yield('edit_profile')">
                                        <i class="nav-icon fas fa-user-edit"></i>
                                        <p>Editar perfil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('alt_password') }}" class="nav-link @yield('alt_password')">
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
            </div>

        </aside>


        @yield('content')

    </div>



    @yield('modal')
    @yield('plugins')
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- InputMask -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>

    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- Page specific script -->
    <script src="{{ asset('js/autocomplete-cep.js') }}"></script>
    <script src="{{ asset('js/inputmask.js') }}"></script>
    <!-- SCRIPT MANUAIS -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/toast.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.js') }}"></script>
    {{-- <script src="{{ asset('js/demo.js') }}"></script> --}}
</body>

</html>
