@extends('control-panel.layout.layout_control_panel')
@section('title', 'Plano de chamada')
@section('cp', 'active')
@section('menu_cp_open', 'menu-open')
@section('scripts')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
    @php
    use App\Classes\Tools;
    $tools = new Tools();
    @endphp
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a class=" d-inline-block nav-link " data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                        <h1 class="d-inline-block m-0">
                            Plano de chamada
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <a href="{{ route('create_military') }}" class="btn btn-success float-r"><i
                                class="fa fa-plus-circle"></i> CADASTRAR </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="table_users" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>P/G</th>
                                            <th>Nome de guerra</th>
                                            <th>CIA</th>
                                            <th>Seção</th>
                                            <th>Endereço</th>
                                            <th>Última atualização</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td data-order="{{ $user->rank->id }}" width="40px"><img
                                                        class="img-circle img-size-35"
                                                        src="{{ asset("$user->photoUrl") }}"></td>
                                                <td data-order="{{ $user->rank->id }}" width="60px">
                                                    {{ $user->rank->rankAbbreviation }}</td>
                                                <td>{{ $user->professionalName }}</td>
                                                <td>{{ $user->company->name }}</td>
                                                <td> {{ $user->departament->name }}</td>
                                                <td>
                                                    @if (isset($user->city->name) && isset($user->city->state))
                                                        {{ $user->street . ', N°' . $user->house_number . ', Bairro: ' . $user->district . ', ' . $user->city->name . ', ' . $user->city->state }}
                                                    @else
                                                        Não há informações.
                                                    @endif
                                                </td>

                                                <td width="180px">{{ date('d/m/Y', strtotime($user->updated_at)) }}</td>

                                                <td width="70px">
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('military_profile', ['id' => $user->id]) }}"
                                                        title="Perfil">
                                                        <i class="fas fa-user">
                                                        </i>
                                                    </a>
                                                    @if (session('user')['company'] == $user->company)
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('edit_military_profile', ['id' => $user->id]) }}"
                                                            title="Editar perfil">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
@section('modal')
    @if (!empty(session('new_login')))
        <div class="modal fade show" id="info_user" aria-labelledby="modal" style="display: block;" aria-modal="true"
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
                        <button type="button" class="btn btn-danger" onclick="hide()">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id='backdrop' class="modal-backdrop fade show"></div>
    @endif
@endsection
@section('plugins')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/numeric-comma.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/users_table_portuguese.js') }}"></script>
@endsection
