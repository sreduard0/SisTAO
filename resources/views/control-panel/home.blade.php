@extends('control-panel.layout.layout_control_panel')
@section('title', 'Home')
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
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->


                <div class="row">

                    <!-- ./col -->


                    <!-- box -->
                    <div class="col-lg-3 col-6">
                        <a href="#" class="small-box bg-success">
                            <div class="inner">
                                <h3>SPED</h3>
                                <p>Sistema de Protocolo Eletrônico de Documentos do Exército</p>
                            </div>
                            {{-- <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div> --}}
                        </a>

                    </div>{{-- box --}}

                    <!-- box -->
                    <div class="col-lg-3 col-6">
                        <a href="#" class="small-box bg-success">
                            <div class="inner">
                                <h3>SisBol</h3>
                                <p>Sistema de Boletins</p>
                            </div>
                            {{-- <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div> --}}
                        </a>

                    </div>{{-- box --}}

                    <!-- box -->
                    <div class="col-lg-3 col-6">
                        <a href="#" class="small-box bg-success">
                            <div class="inner">
                                <h3>Despacho</h3>
                                <p>Gerenciamento da fila de despacho de documentos</p>
                            </div>
                            {{-- <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div> --}}
                        </a>

                    </div>{{-- box --}}

                    <!-- box -->
                    <div class="col-lg-3 col-6">
                        <a href="#" class="small-box bg-success">
                            <div class="inner">
                                <h3>SCLE - SALC</h3>
                                <p>Sistema de Controle de Licetações e Empenhos</p>
                            </div>
                            {{-- <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div> --}}
                        </a>

                    </div>{{-- box --}}

                    <!-- box -->
                    <div class="col-lg-3 col-6">
                        <a href="#" class="small-box bg-success">
                            <div class="inner">
                                <h3>PARPS</h3>
                                <p>Gerenciamento de entrada e saida de civis</p>
                            </div>
                            {{-- <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div> --}}
                        </a>

                    </div>{{-- box --}}
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
