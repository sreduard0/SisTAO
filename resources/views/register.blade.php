<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>SisTAO - Cadastrar-se</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/register.js') }}"></script>
    <script>
        @foreach ($apps as $app)
            $(function() {
            var check = $("#{{ $app->id }}"); //checkbox que ativara os restantes

            check.on('click', function() {
            if (check.prop('checked') == true) {
            $(".{{ $app->name }}_permission").prop("disabled", false); //mostra os as permissoes

            } else if (check.prop('checked') == false) {
            $(".{{ $app->name }}_permission").prop("disabled", true); //oculta os as permissoes
            }
            })
            })
        @endforeach
    </script>
</head>

<body class=" gradient">
    @if (isset($erro))
        <div id="error" class="align-alert d-inline-block">
            <p class="alert alert-info">{{ $erro }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div id="error" class="align-alert d-inline-block">
            <ul class="alert alert-info">
                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>
    @endif
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-register100">
                <form action="{{ route('req_login') }}" method="POST" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title m-b-10">
                        SisTAO
                    </span>
                    <span class="login100-form-title padding-title">
                        <img src="{{ asset('/img/logo.png') }}" class="img-login" alt="">
                    </span>
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#logins-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Perfil e login</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#information-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                    id="information-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Aplicativos</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <div id="logins-part" class="content-request" role="tabpanel"
                                aria-labelledby="logins-part-trigger">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="wrap-input100">
                                            <select class="input100" name="rank_id" id="rank_id">
                                                <option class="option" value=""></option>
                                                @foreach ($all_ranks as $rank)
                                                    <option class="option" value="{{ $rank->id }}">
                                                        {{ $rank->rankAbbreviation }} </option>
                                                @endforeach
                                            </select>
                                            <span class="focus-input100" data-placeholder="P/G"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="wrap-input100">
                                            <input class="input100" type="text" name="professional_name"
                                                id="professional_name">
                                            <span class="focus-input100" data-placeholder="Nome de guerra"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="wrap-input100">
                                            <input class="input100" type="text" name="name" id="name">
                                            <span class="focus-input100" data-placeholder="Nome completo"></span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="wrap-input100">
                                            <input class="input100" type="email" name="email" id="email">
                                            <span class="focus-input100" data-placeholder="E-mail (opcional)"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="wrap-input100">
                                            <select name="company_id" id="company_id" class="input100">
                                                <option class="option" value=""></option>
                                                @foreach ($all_company as $company)
                                                    <option class="option" value="{{ $company->id }}">
                                                        {{ $company->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="focus-input100" data-placeholder="CIA"></span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="wrap-input100">
                                            <select name="departament_id" id="departament_id" class="input100">
                                                <option class="option" value=""></option>
                                                @foreach ($all_departament as $departament)
                                                    <option class="option" value="{{ $departament->id }}">
                                                        {{ $departament->name }} </option>
                                                @endforeach
                                            </select>
                                            <span class="focus-input100" data-placeholder="SEÇ/SET/CL"></span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="wrap-input100">
                                            <input class="input100" type="text" name="idt_mil" id="idt_mil"
                                                data-inputmask="'mask': ['999999999-9']" data-mask="" inputmode="text">
                                            <span class="focus-input100" data-placeholder="IDT Militar"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <div class="wrap-input100">
                                            <span class="btn-show-pass">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                            <input class="input100" type="password" name="password" id="password">
                                            <span class="focus-input100" data-placeholder="Senha"></span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="wrap-input100">
                                            <span class="btn-show-pass">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                            <input class="input100" type="password" name="conf_password"
                                                id="conf_password">
                                            <span class="focus-input100" data-placeholder="Confirmar senha"></span>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-success" onclick="return check_register()">Proximo</a>
                            </div>
                            <div id="information-part" class="content-request" role="tabpanel"
                                aria-labelledby="information-part-trigger">

                                <div class="permissions">
                                    @foreach ($apps as $app)
                                        <div class="row m-b-30">
                                            <div class="col">
                                                {{-- Ativar app --}}
                                                <div class="custom-control custom-switch m-l-30">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="sts_{{ $app->name }}" id={{ $app->id }}
                                                        value='1'>
                                                    <label class="custom-control-label c-gr"
                                                        for={{ $app->id }}>{{ $app->name }}</label>
                                                </div>
                                            </div>
                                            {{-- bloco Permissoes --}}
                                            <div class="col-sm-4">
                                                @if (!$app->special || $app->special == 1)
                                                    {{-- permissao adm --}}
                                                    <div class="custom-control custom-checkbox m-r-10">
                                                        <input
                                                            class="{{ $app->name }}_permission custom-control-input"
                                                            type="radio" id="adm-{{ $app->id }}"
                                                            name='{{ $app->name }}_permission' value="1" disabled>
                                                        <label for="adm-{{ $app->id }}"
                                                            class="custom-control-label c-gr">Administrador</label>
                                                    </div>
                                                    {{-- permissao conv --}}
                                                    <div class="custom-control custom-checkbox m-r-30">
                                                        <input
                                                            class="{{ $app->name }}_permission custom-control-input"
                                                            type="radio" id="conv-{{ $app->id }}"
                                                            name='{{ $app->name }}_permission' value="0" disabled>
                                                        <label for="conv-{{ $app->id }}"
                                                            class="custom-control-label c-gr">Convencional</label>
                                                    </div>
                                                    @if ($app->special == 1)
                                                        {{-- permissao especial --}}
                                                        <div class="custom-control custom-checkbox m-r-30">
                                                            <input
                                                                class="{{ $app->name }}_permission custom-control-input"
                                                                type="radio" id="spc-{{ $app->id }}"
                                                                name='{{ $app->name }}_permission' value="2"
                                                                disabled>
                                                            <label for="spc-{{ $app->id }}"
                                                                class="custom-control-label c-gr">Especial
                                                                (SGTTE)</label>
                                                        </div>
                                                    @endif
                                                @else
                                                    {{-- app link --}}
                                                    <div class="custom-control custom-checkbox">
                                                        <input
                                                            class="{{ $app->name }}_permission custom-control-input"
                                                            type="radio" id="link-{{ $app->id }}"
                                                            name='{{ $app->name }}_permission' value="0" disabled>
                                                        <label for="link-{{ $app->id }}"
                                                            class="custom-control-label c-gr">Link</label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                                <a class="btn btn-success m-t-10" onclick="stepper.previous()">Anterior</a>
                                <div class="container-login100-form-btn m-t-10">
                                    <div class="wrap-login100-form-btn">
                                        <div class="login100-form-bgbtn"></div>
                                        <button type="submit" class="login100-form-btn">
                                            SOLICITAR USUÁRIO
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="text-center">
                    <span class="txt1">
                        Já tem um login?
                    </span><br>
                    <a class="txt2" href="{{ route('login') }}">
                        ACESSE
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- SCRIPTS --}}
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Money Euro
            $('[data-mask]').inputmask()

        })
    </script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('plugins/bs-stepper/js/bs-stepper.js') }}"></script>
    <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
    {{-- /SCRIPTS --}}
</body>

</html>
