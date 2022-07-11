@extends('control-panel.layout.layout_control_panel')
@section('title', 'Início')
@section('home', 'active')
@section('scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/actions-apps.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 765px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="row">
                            <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
                            <h1 class="m-0">
                                Aplicativos
                            </h1>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="breadcrumb float-sm-right custom-control custom-switch">
                            <input class="custom-control-input" type="checkbox" id="theme" name='theme'
                                @if (session('theme') == 1) checked @endif>
                            <label for="theme" class="custom-control-label">Tema escuro</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                @if (count($apps) == 1)
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Aviso:</h5>
                        No momento não há aplicações disponíveis, entre em contato com o administrador do sistema.
                    </div>
                @else
                    <div class="row">
                        @foreach ($apps as $app)
                            @if ($app->apps[0]->id == 6 || !$app->apps[0]->link)
                                {{-- Ignora o sistão --}}
                                @continue
                            @endif
                            @switch($app->apps[0]->special)
                                @case(0)
                                @case(1)
                                    <div class="col-lg-3 col-6">
                                        <a href="{{ route('login_apps', ['id' => $app->apps[0]->id]) }}" target="_blank"
                                            class="small-box bg-success">
                                            <div class="inner">
                                                <h3>{{ $app->apps[0]->name }}</h3>
                                                <p>Clique e acesse</p>
                                            </div>
                                        </a>
                                    </div>
                                @break

                                @case(3)
                                    <div class="col-lg-3 col-6">

                                        @if ($app->apps[0]->inputUser == null || $app->apps[0]->inputPass == null)
                                            <form name='login{{ $app->id }}' target="_blank"
                                                action="{{ $app->apps[0]->link }}" method="post">

                                                <input type="hidden" id="userID" name="userID"
                                                    value="{{ session('user')['id'] }}">
                                                <input type="hidden" id="departament_id" name="departament_id"
                                                    value="{{ session('user')['departament_id'] }}">
                                                <input type="hidden" id="token_sistao" name="token_sistao" value="Mb#Intel@11">
                                                <a onclick="return document.login{{ $app->id }}.submit();"
                                                    class="small-box bg-success">
                                                    <div class="inner">
                                                        <h3>{{ $app->apps[0]->name }}</h3>
                                                        <p>Integrado</p>
                                                    </div>
                                                </a>

                                            </form>
                                        @else
                                            @if (!$app->user && !$app->password)
                                                <a data-toggle="modal" data-target="#login" data-id="{{ $app->id }}"
                                                    data-name="{{ $app->apps[0]->name }}" class="small-box bg-success">
                                                    <div class="inner">
                                                        <h3>{{ $app->apps[0]->name }}</h3>
                                                        <p>Vincule sua conta</p>
                                                    </div>
                                                </a>
                                            @else
                                                <iframe style="display: none" name="the-iframe{{ $app->id }}"></iframe>
                                                <script>
                                                    function postToIframe{{ $app->id }}() {
                                                        $('#form{{ $app->id }}').append(
                                                            '<form action="{{ $app->apps[0]->link }}"  method="post" target="the-iframe{{ $app->id }}" id="post{{ $app->id }}"><input type="hidden" name="{{ $app->apps[0]->inputUser }}" value="{{ $app->user }}" /><input type="hidden" name="{{ $app->apps[0]->inputPass }}" value="{{ $app->password }}" /></form>'
                                                        );

                                                        $('#post{{ $app->id }}').submit().remove();
                                                        window.open('{{ $app->apps[0]->linkHome }}', '_blank');

                                                    }
                                                </script>

                                                <div id="form{{ $app->id }}"></div>


                                                <a onclick="return postToIframe{{ $app->id }}();"
                                                    class="small-box bg-success">
                                                    <div class="inner">
                                                        <h3>{{ $app->apps[0]->name }}</h3>
                                                        <p>Vinculado</p>
                                                    </div>
                                                </a>
                                            @endif
                                        @endif



                                    </div>
                                @break

                                @default
                                    <div class="col-lg-3 col-6">
                                        <a href="{{ route('login_apps', ['id' => $app->apps[0]->id]) }}" target="_blank"
                                            class="small-box bg-success">
                                            <div class="inner">
                                                <h3>{{ $app->apps[0]->name }}</h3>
                                                <p>Link para acesso</p>
                                            </div>
                                        </a>
                                    </div>
                            @endswitch
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </div>
    <footer class="main-footer align-items-center ">
        <footer>
            <div class="text-center">

                &copy;SisTAO 2021 (v1.0) <br>
                Desenvolvido por: Eduardo Martins
            </div>
        </footer>
    </footer>
@endsection
@section('plugins')
    <script>
        $('#login').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id');
            var name = button.data('name');
            var modal = $(this)
            modal.find('.modal-title').text('Vincular ' + name + ' no SisTAO')
            modal.find('#id').val(id)
        });
    </script>
@endsection
@section('modal')
    {{-- Modal criar app --}}
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginLabel">Vincular ap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="link_login">
                        <input type="hidden" id="id" name="id" value="">
                        <div class="form-group col">
                            <label for="login">Login *</label>
                            <input type="text" class="form-control" id="user" name="user"
                                placeholder="Ex: joão" value="">
                        </div>
                        <div class="form-group col">
                            <label for="password">Senha *</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Ex: joao123" value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button onclick="return link_login();" class="btn btn-success">Vincular</button>

                </div>
            </div>
        </div>
    </div>
@endsection
