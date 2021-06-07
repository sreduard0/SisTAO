@extends('control-panel.layout.layout_control_panel')
@section('title', 'Alterar senha')
@section('alt_password', 'active')
@section('content')
    @php
    use App\Classes\Tools;
    $tools = new Tools();
    @endphp
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1165px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a class=" d-inline-block nav-link " data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                        <h1 class="d-inline-block m-0">
                            Alterar senha
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
                <div class="row">
                    <div class="col">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Horizontal Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword3"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Sign in</button>
                                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
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
                                    <li class="row">MÃE: {{ $user_data->motherName }}</li>
                                    <li class="row">PAI: {{ $user_data->fatherName }}</li>
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
    </div>
@endsection
