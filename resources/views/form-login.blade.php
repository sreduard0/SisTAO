<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>SisTAO - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
</head>

<body class="gradient">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="{{ route('login_submit') }}" method="POST" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-26">
                        SisTAO
                    </span>
                    <span class="login100-form-title padding-title">

                        <img src="{{ asset('/img/logo.png') }}" class="img-login" alt="">
                    </span>

                    <div class="wrap-input100">
                        <input class="input100" type="text" name="login" id="login">
                        <span class="focus-input100" data-placeholder="IDT Militar"></span>
                    </div>

                    <div class="wrap-input100">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password" id="password">
                        <span class="focus-input100" data-placeholder="Senha"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Entrar
                            </button>
                        </div>
                    </div>

                    <div class="height mt-3">

                        @if (isset($erro))

                            <p id="error" class="alert alert-danger">{{ $erro }}</p>

                        @endif

                        @if ($errors->any())

                            <ul id="error" class="alert alert-danger">
                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach
                            </ul>

                        @endif

                    </div>

                    <div class="text-center">
                        <span class="txt1">
                            Ainda não tem login?
                        </span><br>
                        <a class="txt2" href="{{ route('register') }}">
                            ACESSE
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- SCRIPTS --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- /SCRIPTS --}}
</body>

</html>
