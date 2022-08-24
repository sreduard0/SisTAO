@extends('control-panel.layout.layout_control_panel')
@section('title', 'Solicitações de login')
@section('adm', 'active')
@section('menu_adm_open', 'menu-open')
@section('register', 'active')
@section('scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/actions-requests.js') }}"></script>
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

        function confirm_request() {
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
                    userID: $('input[name=user_id]').val(),
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
                url: "{{ route('confirm_request') }}",
                type: "POST",
                data: dados,
                dataType: 'text',
                success: function(data) {
                    $("#confirm_request").modal('hide');
                    $("#table_requests").DataTable().clear().draw(6);
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Tudo pronto! O usuário ja pode logar.'
                    });
                },
                error: function(data) {
                    Toast.fire({
                        icon: 'error',
                        title: '&nbsp&nbsp Falha ao aceitar usuário.'
                    });
                }
            });

        }
    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a class=" d-inline-block nav-link " data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                        <h1 class="d-inline-block m-0">
                            Solicitações de login
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="table_requests" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="10px">#</th>
                                            <th width="40px">P/G</th>
                                            <th>Nome de guerra</th>
                                            <th>Nome completo</th>
                                            <th>SEÇ/SET/CL</th>
                                            <th>CIA</th>
                                            <th width="50px">Email</th>
                                            <th width="80px">Ação</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('plugins')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/numeric-comma.js') }}"></script>
    <script>
        $(function() {
            $("#table_requests").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese3.json') }}"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('get_register') }}",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },

                }
            });
        });
    </script>
    <script>
        $('#confirm_request').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id');
            var modal = $(this)
            var url = window.location.origin+'/register/info/' + id
            $.get(url, function(result) {
                document.getElementById('user_id').value = result.id6.login_id;

                @foreach ($apps as $app)

                    $("#{{ $app->id }}").prop("checked", false);
                    $(".{{ $app->id }}_permission").prop("disabled", true)
                    $("#adm-{{ $app->id }}").prop("checked", false);
                    $("#conv-{{ $app->id }}").prop("checked", false);
                    $("#spc-{{ $app->id }}").prop("checked", false);
                    $("#link-{{ $app->id }}").prop("checked", false);
                    $("#vinc-{{ $app->id }}").prop("checked", false);

                    if (typeof result.id{{ $app->id }} !== "undefined")
                    {
                    $("#{{ $app->id }}").prop("checked", true);

                    if (result.id{{ $app->id }}.profileType == 1)
                    {
                    $(".{{ $app->id }}_permission").prop("disabled", false)
                    $("#adm-{{ $app->id }}").prop("checked", true);
                    }
                    else if (result.id{{ $app->id }}.profileType == 0)
                    {
                    $(".{{ $app->id }}_permission").prop("disabled", false)
                    $("#conv-{{ $app->id }}").prop("checked", true);
                    }
                    else if (result.id{{ $app->id }}.profileType == 2)
                    {
                    $(".{{ $app->id }}_permission").prop("disabled", false)
                    $("#spc-{{ $app->id }}").prop("checked", true);
                    }
                    else if (result.id{{ $app->id }}.profileType == 3)
                    {
                    $(".{{ $app->id }}_permission").prop("disabled", false)
                    $("#link-{{ $app->id }}").prop("checked", true);
                    }
                    else if (result.id{{ $app->id }}.profileType == 4)
                    {
                    $(".{{ $app->id }}_permission").prop("disabled", false)
                    $("#vinc-{{ $app->id }}").prop("checked", true);
                    }
                    }

                @endforeach

            });
        });
    </script>
@endsection
@section('modal')
    }
    <div class="modal fade" id="confirm_request" tabindex="-1" role="dialog" aria-labelledby="add_app"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_userLabel">Permissões solicitadas pelo usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <div class="col">
                            @foreach ($apps as $app)
                                <div class="row justify-content-between m-b-30">
                                    {{-- Ativar app --}}
                                    <div class="custom-control custom-switch ">
                                        <input type="checkbox" class="custom-control-input" name="sts_{{ $app->id }}"
                                            id={{ $app->id }} value='1'>
                                        <label class="custom-control-label"
                                            for={{ $app->id }}>{{ $app->name }}</label>
                                    </div>

                                    {{-- bloco Permissoes --}}
                                    <div class="row">
                                        @if (!$app->special || $app->special == 1)
                                            {{-- permissao adm --}}
                                            <div class="custom-control custom-checkbox m-r-10">
                                                <input class="{{ $app->id }}_permission custom-control-input"
                                                    type="radio" id="adm-{{ $app->id }}"
                                                    name='{{ $app->id }}_permission' value="1" disabled>
                                                <label for="adm-{{ $app->id }}"
                                                    class="custom-control-label">Admin</label>
                                            </div>
                                            {{-- permissao conv --}}
                                            <div class="custom-control custom-checkbox m-r-30">
                                                <input class="{{ $app->id }}_permission custom-control-input"
                                                    type="radio" id="conv-{{ $app->id }}"
                                                    name='{{ $app->id }}_permission' value="0" disabled>
                                                <label for="conv-{{ $app->id }}"
                                                    class="custom-control-label">Conv</label>
                                            </div>
                                            @if ($app->special == 1)
                                                {{-- permissao especial --}}
                                                <div class="custom-control custom-checkbox m-r-30">
                                                    <input class="{{ $app->id }}_permission custom-control-input"
                                                        type="radio" id="spc-{{ $app->id }}"
                                                        name='{{ $app->id }}_permission' value="2" disabled>
                                                    <label for="spc-{{ $app->id }}" class="custom-control-label">Esp
                                                        (SGTTE)</label>
                                                </div>
                                            @endif
                                        @elseif ($app->special == 2)
                                            {{-- app link --}}
                                            <div class="custom-control custom-checkbox m-r-30">
                                                <input class="{{ $app->id }}_permission custom-control-input"
                                                    type="radio" id="link-{{ $app->id }}"
                                                    name='{{ $app->id }}_permission' value="3" disabled>
                                                <label for="link-{{ $app->id }}"
                                                    class="custom-control-label">Link</label>
                                            </div>
                                        @elseif ($app->special == 3)
                                            {{-- Vinculado --}}
                                            <div class="custom-control custom-checkbox m-r-30">
                                                <input class="{{ $app->id }}_permission custom-control-input"
                                                    type="radio" id="vinc-{{ $app->id }}"
                                                    name='{{ $app->id }}_permission' value="4" disabled>
                                                <label for="vinc-{{ $app->id }}"
                                                    class="custom-control-label">Vinculado</label>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <hr>
                            @endforeach
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button onclick="return confirm_request()" class="btn btn-success">Aceitar</button>

                </div>
            </div>
        </div>
    </div>
@endsection
