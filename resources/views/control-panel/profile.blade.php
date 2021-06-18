@extends('control-panel.layout.layout_control_panel')
@section('title', 'Perfil')
@section('profile', 'active')
@section('menu_profile_open', 'menu-open')
@section('content')
    @php
    use App\Classes\Tools;
    $tools = new Tools();
    @endphp
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
                        style="background: url('{{ $user_data->backgroundUrl }}') center center;background-size:100%">
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
                                    <h3 class="card-title card-title-background"> <i class="fas fa-map-marker-alt mr-1"></i>
                                        Endereço</h3>
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
                                    <h3 class="card-title card-title-background"> <i class="fas fa-id-badge mr-1"></i>
                                        Contato</h3>
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
@endsection
