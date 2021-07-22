@extends('control-panel.layout.layout_control_panel')
@section('title', 'Início')
@section('home', 'active')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 765px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a class=" d-inline-block nav-link " data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                        <h1 class="d-inline-block m-0">
                            Painel de controle
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">


                @if (empty($apps[0]))
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Aviso:</h5>
                        No momento não há aplicações disponíveis, entre em contato com o administrador do sistema.
                    </div>
                @else
                    <div class="row">
                        @foreach ($apps as $app)
                        @if ($app->apps[0]->id == 6)
                            {{-- Ignora o sistão --}}
                            @continue
                        @endif
                            <div class="col-lg-3 col-6">
                                <a href={{ $app->apps[0]->link }} class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $app->apps[0]->name }}</h3>
                                        <p>Clique e acesse</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif


            </div>
        </section>
    </div>
@endsection
