@extends('control-panel.layout.layout_control_panel')
@section('title', 'Início')
@section('home', 'active')
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
                            <input class="custom-control-input" type="checkbox" id="theme" name='theme' @if (session('theme') == 1) checked @endif>
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
                            @switch(!$app->apps[0]->special)
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
@endsection
