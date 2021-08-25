@extends('control-panel.layout.layout_control_panel')
@section('title', 'Criar usuário')
@section('menu_adm_open', 'menu-open')
@section('users', 'active')
@section('adm', 'active')
{{-- SGTTE --}}
@section('cp', 'active')
@section('menu_cp_open', 'menu-open')
{{-- SGTTE/ --}}
@section('scripts')
    <script src="{{ asset('js/croppie.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/select-img-bg.js') }}"></script>
    <script src="{{ asset('js/text-replace.js') }}"></script>
    <script src="{{ asset('js/request_fronend_user.js') }}"></script>
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
                            Criar Perfil
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
                        style="background: url('/img/img_background/bg3.jpg') center center;background-size:contain"
                        id="img_bg">
                    </div>
                    <div class="widget-user-image">
                        <img id="img_profile" class="img-circle"
                            src="{{ asset('img/img_profiles/img_profile_padrao.png') }}" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="description-block">
                            <h3 class="widget-user-desc text-center">
                                <span id="rankAbbr"> P/G</span>
                                <span id="professionalName">Nome de guerra</span>
                            </h3>
                            <h5 class="widget-user-username text-center" id="departamentId">Seção</h5>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col">
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
                            <form id="info_user" action="{{ route('submit_create_user') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="tab-content m-rl-80">

                                        <div class="active tab-pane" id="info">

                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <label for="pg">* Posto/Grad</label>
                                                    <select class="form-control" name="rank_id" id="rank_id">
                                                        <option value="">Selecione</option>
                                                        @foreach ($all_ranks as $rank)
                                                            <option @if (old('rank_id') == $rank->id) selected="selected" @endif value="{{ $rank->id }}">
                                                                {{ $rank->rankAbbreviation }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label for="military_id">N°</label>
                                                    <input type="text" class="form-control" id="military_id"
                                                        name="military_id" placeholder="N°"
                                                        value="{{ old('military_id') }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="professionalname">* Nome de gerra</label>
                                                    <input type="text" class="form-control" id="professional_name"
                                                        name="professional_name" placeholder="Digite seu nome de guerra"
                                                        value="{{ old('professional_name') }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="company_id">* SEÇ/SET/CL</label>
                                                    <select name="departament_id" id="departament_id" class="form-control">
                                                        <option value="">Selecione</option>
                                                        @foreach ($all_departament as $departament)
                                                            <option @if (old('departament_id') == $departament->id) selected="selected" @endif
                                                                value="{{ $departament->id }}">
                                                                {{ $departament->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="company_id">* CIA</label>
                                                    <select name="company_id" id="company_id" class="form-control">
                                                        <option value="">Selecione</option>
                                                        @foreach ($all_company as $company)
                                                            <option @if (old('company_id') == $company->id) select="selected" @endif value="{{ $company->id }}">
                                                                {{ $company->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="form-group col">
                                                    <label for="name">* Nome completo</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Digite seu nome completo" value="{{ old('name') }}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="idt_mil">* IDT Militar</label>
                                                    <input type="text" class="form-control"
                                                        data-inputmask="'mask': ['999999999-9']" data-mask=""
                                                        inputmode="number" name="idt_mil" id="idt_mil"
                                                        placeholder="_________-_" value="{{ old('idt_mil') }}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Data de nascimento</label>
                                                    <div class="input-group date" id="born_at" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            data-target="#born_at" id="born_at" name="born_at"
                                                            value="{{ old('born_at') }}">
                                                        <div class="input-group-append" data-target="#born_at"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="mother_name">Nome da mãe</label>
                                                        <input type="text" id="mother_name" name="mother_name"
                                                            class="form-control" placeholder="Nome da mãe"
                                                            value="{{ old('mother_name') }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="father_name">Nome do pai</label>
                                                        <input type="text" id="father_name" name="father_name"
                                                            class="form-control" placeholder="Nome do pai"
                                                            value="{{ old('father_name') }}">
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="street">Logradouro</label>
                                                    <input type="text" class="form-control" id="street" name="street"
                                                        placeholder="Logradouro" value="{{ old('street') }}">
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label for="house_number">Nº</label>
                                                    <input type="text" class="form-control" id="house_number"
                                                        name="house_number" placeholder="Nº"
                                                        value="{{ old('houde_nmber') }}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="cpf">CEP</label>
                                                    <input type="text" class="form-control"
                                                        data-inputmask="'mask': ['99999-999']" data-mask="" inputmode="text"
                                                        id="cep" name="cep" placeholder="_______-__"
                                                        value="{{ old('cep') }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="district">Bairro</label>
                                                    <input type="text" id="district" name="district" class="form-control"
                                                        placeholder="Bairro" value="{{ old('district') }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="city">CIA</label>
                                                    <select name="city" id="city" class="form-control">
                                                        <option value="">Selecione</option>
                                                        @foreach ($all_cities as $city)
                                                            <option @if (old('city') == $city->id) selected="selected" @endif value="{{ $city->id }}">
                                                                {{ $city->name }},
                                                                {{ $city->state }}</option>
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
                                                        value="{{ old('phone1') }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="phone2">Telefone 2</label>
                                                    <input type="text" class="form-control"
                                                        data-inputmask="'mask': ['(99) 9 9999-9999']" inputmode="text"
                                                        data-mask="" id="phone2" name="phone2" placeholder="Telefone"
                                                        value="{{ old('phone2') }}">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="email">E-mail</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="E-mail" value="{{ old('email') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                                <div class="text-center">
                                    @if (session('SisTAO')['profileType'] == 1)
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="login" name="login"
                                                checked="" value="1">
                                            <label for="login" class="custom-control-label m-b-10">Gerar login</label>
                                        </div>
                                    @endif
                                    <a class="btn btn-default" href="{{ route('users_list') }}">Cancelar</a>
                                    <button type="submit" class="btn btn-success" onclick="return check_create_user()"> <i
                                            class="fa fa-user-edit"></i>
                                        Criar</button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>


@endsection
