@extends('control-panel.layout.layout_control_panel')
@section('title', 'Perfil')
@section('menu_open', 'menu-open')
@section('edit_profile', 'active')
@section('scripts')
    <script src="js/croppie.js"></script>
    <link rel="stylesheet" href="css/croppie.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    @php
    use App\Classes\Tools;
    $tools = new Tools();
    @endphp
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
                        style="background: url('{{ $user_data->backgroundUrl }}') center center;">
                    </div>
                    <div class="widget-user-image">
                        <img id="img_profile" class="img-circle" src="{{ $user_data->photoUrl }}" alt="User Avatar">
                        <div class="panel-body">
                            <button class="btn btn-success edit-img-profile" data-toggle="modal"
                                data-target="#alt-img-profile"> <i class="fa fa-pen"></i></button>
                        </div>
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

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#info"
                                            data-toggle="tab">Informações basicas</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#address" data-toggle="tab">Endereço</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Contato</a>
                                    </li>
                                </ul>
                            </div>
                            <form action="{{ route('submit_alt_profile') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="tab-content m-rl-80">

                                        <div class="active tab-pane" id="info">

                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <label for="pg">Posto/Grad</label>
                                                    <select class="form-control" name="rank_id" id="rank_id" required
                                                        disabled>
                                                        <option value="">Selecione</option>
                                                        @foreach ($all_ranks as $rank)
                                                            <option @if ($user_data->rank_id == $rank->id) selected="selected" @endif
                                                                value="{{ $rank->id }}">
                                                                {{ $rank->rankAbbreviation }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label for="military_id">N°</label>
                                                    <input type="text" class="form-control" id="military_id"
                                                        name="military_id" placeholder="N°"
                                                        value="{{ $user_data->militaryId }}" required disabled>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="professionalname">Nome de gerra</label>
                                                    <input type="text" class="form-control" id="professional_name"
                                                        name="professional_name" placeholder="Digite seu nome de guerra"
                                                        value="{{ $user_data->professionalName }}" required disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="company_id">SEÇ/SET/CL</label>
                                                    <select name="departament_id" id="departament_id" class="form-control"
                                                        required disabled>
                                                        <option value="">Selecione</option>
                                                        @foreach ($all_departament as $departament)
                                                            <option @if ($user_data->departament_id == $departament->id) selected="selected" @endif
                                                                value="{{ $departament->id }}">
                                                                {{ $departament->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="company_id">CIA</label>
                                                    <select name="company_id" id="company_id" class="form-control" required
                                                        disabled>
                                                        <option value="">Selecione</option>
                                                        @foreach ($all_company as $company)
                                                            <option @if ($user_data->company_id == $company->id) selected="selected" @endif
                                                                value="{{ $company->id }}">
                                                                {{ $company->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="form-group col">
                                                    <label for="name">Nome completo</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Digite seu nome completo"
                                                        value="{{ $user_data->name }}" required disabled>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="cpf">CPF</label>
                                                    <input type="text" class="form-control"
                                                        data-inputmask="'mask': ['999.999.999-99']" data-mask=""
                                                        inputmode="text" name="cpf" id="cpf" placeholder="___.___.___-__"
                                                        value="{{ $user_data->cpf }}" required disabled>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Data de nascimento</label>
                                                    <div class="input-group date" id="born_at" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#born_at" id="born_at" name="born_at"
                                                            value="{{ date('d/m/Y', strtotime($user_data->born_at)) }}"
                                                            required disabled>
                                                        <div class="input-group-append" data-target="#born_at"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="mother_name">Nome da mãe</label>
                                                    <input type="text" id="mother_name" name="mother_name"
                                                        class="form-control" placeholder="Nome da mãe"
                                                        value="{{ $user_data->motherName }}" required disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="father_name">Nome do pai</label>
                                                    <input type="text" id="father_name" name="father_name"
                                                        class="form-control" placeholder="Nome do pai"
                                                        value="{{ $user_data->fatherName }}" required disabled>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="street">Logradouro</label>
                                                    <input type="text" class="form-control" id="street" name="street"
                                                        placeholder="Logradouro" value="{{ $user_data->street }}"
                                                        required disabled>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label for="house_number">Nº</label>
                                                    <input type="text" class="form-control" id="house_number"
                                                        name="house_number" placeholder="Nº"
                                                        value="{{ $user_data->house_number }}" required disabled>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="cpf">CEP</label>
                                                    <input type="text" class="form-control"
                                                        data-inputmask="'mask': ['99999-999']" data-mask="" inputmode="text"
                                                        id="cep" name="cep" placeholder="_______-__"
                                                        value="{{ $user_data->cep }}" required disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="district">Bairro</label>
                                                    <input type="text" id="district" name="district" class="form-control"
                                                        placeholder="Bairro" value="{{ $user_data->district }}" required
                                                        disabled>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="city">CIA</label>
                                                    <select name="city" id="city" class="form-control" required disabled>
                                                        <option value="">Selecione</option>
                                                        @foreach ($all_cities as $city)
                                                            <option @if ($user_data->city_id == $city->id) selected="selected" @endif
                                                                value="{{ $city->id }}">
                                                                {{ $city->name }}, {{ $city->state }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="contact">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="phone1">Telefone 1</label>
                                                    <input type="text" class="form-control"
                                                        data-inputmask="'mask': ['(99) 9 9999-9999']" inputmode="text"
                                                        data-mask="" id="phone1" name="phone1" placeholder="Telefone"
                                                        value="{{ $user_data->phone1 }}" required disabled>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="phone2">Telefone 2</label>
                                                    <input type="text" class="form-control"
                                                        data-inputmask="'mask': ['(99) 9 9999-9999']" inputmode="text"
                                                        data-mask="" id="phone2" name="phone2" placeholder="Telefone"
                                                        value="{{ $user_data->phone2 }}" disabled>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="email">E-mail</label>
                                                    <input type="text" class="form-control" id="email" name="email"
                                                        placeholder="E-mail" value="{{ $user_data->email }}" required
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                                <div id="btn-submit" class="text-center">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#alt-user"> <i class="fa fa-user-edit"></i> Editar</button>
                                </div>

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

    {{-- Modal de aviso alt img perfil --}}
    <div class="modal fade show" id="alt-img-profile" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alteração de imagem do perfil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> ATENÇÃO: As informações inseridas aqui são de <strong>responsabilidade do militar</strong>, caso
                        seja verificada
                        inconsistência nos dados, o militar poderá sofrer sanções disciplinares previstas no Regulamento
                        Disciplinar do Exército (RDE).</p><br>
                    <small>(A foto deverá ser com o uniforme 9º C2 com fundo de cor clara.)</small>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <label for="upload_image" class="btn btn-success">Alterar imagem</label>
                    <input type="file" class="btn btn-success input-img-profile" name="upload_image" id="upload_image"
                        accept="image/png,image/jpg,image/jpeg" onchange="checkExt(this)" />
                </div>
            </div>
        </div>
    </div>
    {{-- Modal de aviso alt info pessoais --}}
    <div class="modal fade show" id="alt-user" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alteração de informações pessoais</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> ATENÇÃO: As informações inseridas aqui são de <strong>responsabilidade do militar</strong>, caso
                        seja verificada
                        inconsistência nos dados, o militar poderá sofrer sanções disciplinares previstas no Regulamento
                        Disciplinar do Exército (RDE).</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button id='enable-form' type="button" class="btn btn-success" data-dismiss="modal">Continuar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    {{-- Modal de envio de imagem --}}
    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajustar imagem</h4>
                </div>
                <div class="modal-body">
                    <div id="image_demo"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-success crop_image">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/crop-img-profile.js"></script>
@endsection
