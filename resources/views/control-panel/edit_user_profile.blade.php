@extends('control-panel.layout.layout_control_panel')
@section('title', 'Editar informações do militar')
@section('adm', 'active')
@section('menu_adm_open', 'menu-open')
@section('users', 'active')
{{-- SGTTE --}}
@section('cp', 'active')
@section('menu_cp_open', 'menu-open')
{{-- SGTTE/ --}}
@section('scripts')
    <script src="{{ asset('js/croppie.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/request_fronend_user.js') }}"></script>
    <script src="{{ asset('js/check-permission.js') }}"></script>
    @if (session('SisTAO')['profileType'] == 1)
        <script>
            @foreach ($apps as $app)
                $(function() {
                var check = $("#{{ $app->id }}"); //checkbox que ativara os restantes

                check.on('click', function() {
                if (check.prop('checked') == true) {
                $(".{{ $app->id }}_permission").prop("disabled", false); //mostra os as permissoes

                } else if (check.prop('checked') == false) {
                $(".{{ $app->id }}_permission").prop("disabled", true); //oculta os as permissoes
                }
                })
                })
            @endforeach

            function aplly() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000
                });
                @foreach ($apps as $app)
                    if($('input[name=sts_{{ $app->id }}]').is(':checked')){
                    check{{ $app->id }} = 1;

                    if(!$('input[name={{ $app->id }}_permission]').is(':checked')){
                    Toast.fire({
                    icon: 'error',
                    title: '&nbsp&nbsp Selecione uma permissão para {{ $app->name }}.'
                    });
                    return false;
                    }
                    }else{
                    check{{ $app->id }} = null;
                    }
                @endforeach

                var dados = {
                    @foreach ($apps as $app)

                        {{ $app->id }}:
                        {
                        userID: {{ $user_data->id }},
                        appID: {{ $app->id }},
                        check: check{{ $app->id }},
                        permission: $('input[name={{ $app->id }}_permission]:checked').attr('value'),
                        },
                    @endforeach
                };

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "http://sistao.3bsup.eb.mil.br/alt_permissions",
                    type: "POST",
                    data: dados,
                    dataType: 'text',
                    success: function(data) {
                        Toast.fire({
                            icon: 'success',
                            title: '&nbsp&nbsp Permissões alteradas com sucesso.'
                        });
                    },
                    error: function(data) {
                        Toast.fire({
                            icon: 'error',
                            title: '&nbsp&nbsp Falha ao alterar permissões do usuário.'
                        });
                    }
                });

            }
        </script>
    @endif

@endsection

@section('content')
    @php
    use App\Classes\Tools;
    $tools = new Tools();
    @endphp

    <!-- Content Wrapper. Contains page content  style="min-height: 1450px;" -->
    @if (session('SisTAO')['profileType'] == 1)
        <div class="content-wrapper" style="min-height: 1850px;">
        @else
            <div class="content-wrapper" style="min-height: 1150px;">
    @endif

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a class=" d-inline-block nav-link " data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                    <h1 class="d-inline-block m-0">
                        Editar informações de {{ $user_data->name }}
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
                    style="background: url('{{ asset("$user_data->backgroundUrl") }}') center center;background-size:contain"
                    id="img_bg">
                    @if (session('SisTAO')['profileType'] == 1)
                        <a class="btn btn-success btn-edit-user"
                            href="{{ route('profile', ['id' => $user_data->id]) }}"><i
                                class="fa fa-user m-r-10"></i>Visualizar perfil</a>
                    @else
                        <a class="btn btn-success btn-edit-user"
                            href="{{ route('military_profile', ['id' => $user_data->id]) }}"><i
                                class="fa fa-user m-r-10"></i>Visualizar perfil</a>
                    @endif
                </div>
                <div class="widget-user-image">
                    <img id="img_profile" class="img-circle" src="{{ asset("$user_data->photoUrl") }} "
                        alt="User Avatar">
                    <div class="panel-body">
                        <button class="btn btn-success edit-img-profile" data-toggle="modal" data-target="#alt-img-profile">
                            <i class="fa fa-pen"></i></button>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="description-block">
                        <h3 class="widget-user-desc text-center"> {{ $user_data->rank->rankAbbreviation }}
                            {{ $user_data->professionalName }}</h3>
                        <h5 class="widget-user-username text-center">{{ $user_data->departament->name }}</h5>
                        <span>Atualizado pela última vez em
                            {{ date('d/m/Y', strtotime($user_data->updated_at)) }}</span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">Informações
                                        básicas</a></li>
                                <li class="nav-item"><a class="nav-link" href="#address" data-toggle="tab">Endereço</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Contato</a>
                                </li>
                            </ul>
                        </div>
                        <form id="info_user" action="{{ route('submit_alt_profile') }}" method="POST">
                            @csrf
                            <input type="hidden" name='id' id='id' value="{{ $user_data->id }}">
                            <div class="card-body">
                                <div class="tab-content m-rl-80">

                                    <div class="active tab-pane" id="info">

                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label for="pg">Posto/Grad</label>
                                                <select class="form-control" name="rank_id" id="rank_id" disabled>
                                                    <option value="">Selecione</option>
                                                    @foreach ($all_ranks as $rank)
                                                        <option @if ($user_data->rank_id == $rank->id) selected="selected" @endif value="{{ $rank->id }}">
                                                            {{ $rank->rankAbbreviation }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label for="military_id">N°</label>
                                                <input type="text" class="form-control" id="military_id" name="military_id"
                                                    placeholder="N°" value="{{ $user_data->militaryId }}" disabled>
                                            </div>
                                            <div class="form-group col">
                                                <label for="professionalname">Nome de gerra</label>
                                                <input type="text" class="form-control" id="professional_name"
                                                    name="professional_name" placeholder="Digite seu nome de guerra"
                                                    value="{{ $user_data->professionalName }}" disabled>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="company_id">SEÇ/SET/CL</label>
                                                <select name="departament_id" id="departament_id" class="form-control"
                                                    disabled>
                                                    <option value="">Selecione</option>
                                                    @foreach ($all_departament as $departament)
                                                        <option @if ($user_data->departament_id == $departament->id) selected="selected" @endif value="{{ $departament->id }}">
                                                            {{ $departament->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="company_id">CIA</label>
                                                <select name="company_id" id="company_id" class="form-control" disabled>
                                                    <option value="">Selecione</option>
                                                    @foreach ($all_company as $company)
                                                        <option @if ($user_data->company_id == $company->id) selected="selected" @endif value="{{ $company->id }}">
                                                            {{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="form-group col">
                                                <label for="name">Nome completo</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Digite seu nome completo" value="{{ $user_data->name }}"
                                                    disabled>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="idt_mil">IDT Militar</label>
                                                <input type="text" class="form-control"
                                                    data-inputmask="'mask': ['999999999-9']" data-mask="" inputmode="text"
                                                    name="idt_mil" id="idt_mil" placeholder="_________-_"
                                                    value="{{ $user_data->idt_mil }}" disabled>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Data de nascimento</label>
                                                <div class="input-group date" id="born_at" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                        data-target="#born_at" id="born_at" name="born_at"
                                                        value="{{ date('d/m/Y', strtotime($user_data->born_at)) }}"
                                                        disabled>
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
                                                <input type="text" id="mother_name" name="mother_name" class="form-control"
                                                    placeholder="Nome da mãe" value="{{ $user_data->motherName }}"
                                                    disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="father_name">Nome do pai</label>
                                                <input type="text" id="father_name" name="father_name" class="form-control"
                                                    placeholder="Nome do pai" value="{{ $user_data->fatherName }}"
                                                    disabled>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="address">
                                        <div class="row">
                                            <div class="form-group col">
                                                <label for="street">Logradouro</label>
                                                <input type="text" class="form-control" id="street" name="street"
                                                    placeholder="Logradouro" value="{{ $user_data->street }}" disabled>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label for="house_number">Nº</label>
                                                <input type="text" class="form-control" id="house_number"
                                                    name="house_number" placeholder="Nº"
                                                    value="{{ $user_data->house_number }}" disabled>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="cpf">CEP</label>
                                                <input type="text" class="form-control"
                                                    data-inputmask="'mask': ['99999-999']" data-mask="" inputmode="text"
                                                    id="cep" name="cep" placeholder="_______-__"
                                                    value="{{ $user_data->cep }}" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="district">Bairro</label>
                                                <input type="text" id="district" name="district" class="form-control"
                                                    placeholder="Bairro" value="{{ $user_data->district }}" disabled>
                                            </div>
                                            <div class="form-group col">
                                                <label for="city">Cidade</label>
                                                <select name="city" id="city" class="form-control" disabled>
                                                    <option value="">Selecione</option>
                                                    @foreach ($all_cities as $city)
                                                        <option @if ($user_data->city_id == $city->id) selected="selected" @endif value="{{ $city->id }}">
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
                                                    value="{{ $user_data->phone1 }}" disabled>
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
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="E-mail" value="{{ $user_data->email }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                            <div id="btn-submit" class="text-center">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#alt-user">
                                    <i class="fa fa-user-edit"></i> Editar</button>
                            </div>

                        </form>
                    </div>
                    @if (session('SisTAO')['profileType'] == 1 && isset($user_data->login->login))

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title card-title-background "> <i class="fas fa-th-list mr-1"></i>
                                    Aplicações</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <form>
                                        @foreach ($apps as $app)
                                            <div class="row justify-content-between m-b-30">
                                                {{-- Ativar app --}}
                                                <div class="custom-control custom-switch ">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="sts_{{ $app->id }}" id={{ $app->id }} value='1'
                                                        @if ($app->profiles) checked @endif>
                                                    <label class="custom-control-label"
                                                        for={{ $app->id }}>{{ $app->name }}</label>
                                                </div>

                                                {{-- bloco Permissoes --}}
                                                <div class="row">
                                                    @if (!$app->special || $app->special == 1)
                                                        {{-- permissao adm --}}
                                                        <div class="custom-control custom-checkbox m-r-10">
                                                            <input
                                                                class="{{ $app->id }}_permission custom-control-input"
                                                                type="radio" id="adm-{{ $app->id }}"
                                                                name='{{ $app->id }}_permission' value="1"
                                                                @if ($app->profiles && $app->profiles->profileType == 1) checked @elseif(!$app->profiles) disabled @endif>
                                                            <label for="adm-{{ $app->id }}"
                                                                class="custom-control-label">Administrador</label>
                                                        </div>
                                                        {{-- permissao conv --}}
                                                        <div class="custom-control custom-checkbox m-r-30">
                                                            <input
                                                                class="{{ $app->id }}_permission custom-control-input"
                                                                type="radio" id="conv-{{ $app->id }}"
                                                                name='{{ $app->id }}_permission' value="0"
                                                                @if ($app->profiles && $app->profiles->profileType == 0) checked @elseif(!$app->profiles) disabled @endif>
                                                            <label for="conv-{{ $app->id }}"
                                                                class="custom-control-label">Convencional</label>
                                                        </div>
                                                        @if ($app->special == 1)
                                                            {{-- permissao especial --}}
                                                            <div class="custom-control custom-checkbox m-r-30">
                                                                <input
                                                                    class="{{ $app->id }}_permission custom-control-input"
                                                                    type="radio" id="spc-{{ $app->id }}"
                                                                    name='{{ $app->id }}_permission' value="2"
                                                                    @if ($app->profiles && $app->profiles->profileType == 2) checked @elseif(!$app->profiles) disabled @endif>
                                                                <label for="spc-{{ $app->id }}"
                                                                    class="custom-control-label">Especial
                                                                    (SGTTE)</label>
                                                            </div>
                                                        @endif
                                                    @elseif ($app->special == 2)
                                                        {{-- app link --}}
                                                        <div class="custom-control custom-checkbox m-r-30">
                                                            <input
                                                                class="{{ $app->id }}_permission custom-control-input"
                                                                type="radio" id="link-{{ $app->id }}"
                                                                name='{{ $app->id }}_permission' value="3"
                                                                @if ($app->profiles && $app->profiles->profileType == 3) checked @elseif(!$app->profiles) disabled @endif>
                                                            <label for="link-{{ $app->id }}"
                                                                class="custom-control-label">Link</label>
                                                        </div>
                                                    @elseif ($app->special == 3)
                                                        {{-- Vinculado --}}
                                                        <div class="custom-control custom-checkbox m-r-30">
                                                            <input
                                                                class="{{ $app->id }}_permission custom-control-input"
                                                                type="radio" id="vinc-{{ $app->id }}"
                                                                name='{{ $app->id }}_permission' value="4"
                                                                @if ($app->profiles && $app->profiles->profileType == 4) checked @elseif(!$app->profiles) disabled @endif>
                                                            <label for="vinc-{{ $app->id }}"
                                                                class="custom-control-label">Vinculado</label>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </form>
                                    <button onclick="return aplly()" class="btn btn-success float-r">Aplicar</button>
                                </div>
                            </div>
                        </div>
                        <div class="float-r">
                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete-confirm"><i
                                    class="fa fa-trash"></i> Excluir </button>
                        </div>
                    @elseif(session('SisTAO')['profileType'] == 1 && !isset($user_data->login->login))
                        <div class="float-r">
                            <a class="btn btn-primary"
                                href="{{ route('password', ['f' => 'create', 'id' => $user_data->id]) }}"
                                title='Criar login de acesso'> <i class="fa fa-user-lock"></i> Criar login de acesso

                            </a>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete-confirm"><i
                                    class="fa fa-trash"></i> Excluir </button>
                        </div>
                    @endif
                </div>
                <div class="col-md-3">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Visão geral</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-user mr-1"></i> Informações básicas</strong>

                            <ul class="text-muted">
                                <li class="row">NOME: {{ $user_data->name }}</li>
                                <li class="row">MILITAR:
                                    {{ $user_data->rank->rankAbbreviation }}
                                    {{ $user_data->militaryId }}
                                    {{ $user_data->professionalName }}
                                </li>
                                <li class="row">CIA: @if (isset($user_data->company->name))
                                        {{ $user_data->company->name }}
                                    @endif
                                </li>
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
                                <li class="row">CIDADE: @if (isset($user_data->city->name))
                                        {{ $user_data->city->name }}
                                    @endif
                                </li>
                                <li class="row">ESTADO: @if (isset($user_data->city->state)){{ $user_data->city->state }}
                                    @endif
                                </li>
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
    {{-- Confirmação de exclusão de usuario --}}
    <div class="modal fade" id="delete-confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Deseja mesmo excluir {{ $user_data->rank->rankAbbreviation }}
                        {{ $user_data->professionalName }} ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="TituloModalCentralizado"><strong>Essa operação não pode ser
                            desfeita!</strong></h5>
                    <br>
                    Confirmando a exclusão de <strong>{{ $user_data->rank->rankAbbreviation }}
                        {{ $user_data->professionalName }}</strong>, todos os dados contidos neste
                    usuário serão excluidos <strong>permanentementes</strong>, sem possibilidade de restaura-los.
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger"
                        href="{{ route('delete_profile', ['id' => $user_data->id]) }}">Confirmar</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

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
    <script src="{{ asset('js/crop-img-user.js') }}"></script>

    @if (!empty(session('new_login')))
        <div class="modal fade show" id="info_login" aria-labelledby="modal" style="display: block;" aria-modal="true"
            role="dialog">
            <div class=" modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="info_user">USUÁRIO E SENHA DO NOVO USUÁRIO</h5>
                    </div>
                    <div class="modal-body">
                        <h1 class="fs-15">REPASSAR AS SEGUINTES INFORMAÇÕES AO USUÁRIO:</h1><br>
                        <strong>- Usuário:</strong> {{ session('new_login')['login'] }} <br>
                        <strong>- Senha provisória:</strong> {{ session('new_login')['password'] }}
                        <ul class="mt-3">
                            <li>Algumas questões importantes de segurança devem ser observadas:</li>
                            <li>Para a troca da senha provisória basta acessar seu perfil . A alteração da senha ocorre
                                de forma imediata;</li>
                            <li>Atente para a forma da senha (deverá ser alfanumérica com no mínimo 8 caracteres -
                                incluir letras maiúsculas, minúsculas e números)</li>
                            <li>É recomendado que o usuário troque sua senha mensalmente;</li>
                            <li>A senha é pessoal e intransferível, portanto não deve ser compartilhada;</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="hide2()">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id='backdrop' class="modal-backdrop fade show"></div>
    @endif
@endsection
