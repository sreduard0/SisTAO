@extends('control-panel.layout.layout_control_panel')
@section('title', 'Lista de aplicativos')
@section('adm', 'active')
@section('menu_adm_open', 'menu-open')
@section('apps', 'active')
@section('scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/actions-apps.js') }}"></script>
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
                            Lista de aplicativos
                        </h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <button class="btn btn-success float-r" type="button" data-toggle="modal" data-target="#add_app">
                            NOVO APP <i class="fa fa-plus-circle"></i> </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="table_apps" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="10px">#</th>
                                            <th>Sigla</th>
                                            <th>Nome</th>
                                            <th>Link</th>
                                            <th width="50px">Permissão</th>
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
    <script src="{{ asset('plugins/datatables/numeric-comma.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#table_apps").DataTable({
                "paging": true,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese2.json') }}"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('get_application') }}",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },

                }
            });
        });
    </script>
    <script>
        $('#edit_app').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id');
            var modal = $(this)
            var url = 'http://sistao.3bsup.eb.mil.br/apps/info/' + id
            $.get(url, function(result) {
                modal.find('.modal-title').text('Editar ' + result.name)
                modal.find('#id').val(result.id)
                modal.find('#abbreviationApp').val(result.name)
                modal.find('#fullname').val(result.fullName)
                modal.find('#applink').val(result.link)
                modal.find('#input_user').val(result.inputUser)
                modal.find('#input_pass').val(result.inputPass)
                if (result.special == 1) {
                    $("#pspecial1").prop("checked", true);
                } else if (result.special == 2) {
                    $("#pspecial2").prop("checked", true);
                } else if (result.special == null) {
                    $("#pspecial3").prop("checked", true);
                } else if (result.special == 3) {
                    $("#pspecial4").prop("checked", true);
                }
            })
        });
    </script>
@endsection
@section('modal')
    {{-- Editar APP --}}
    <div class="modal fade" id="edit_app" tabindex="-1" role="dialog" aria-labelledby="add_app" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_userLabel">Editar aplicação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="id" name="id" value="">
                        <div class="form-group col">
                            <label for="abbreviationApp">Sigla *</label>
                            <input type="text" class="form-control" id="abbreviationApp" name="abbreviationApp"
                                placeholder="Ex: SisTAO" value="">
                        </div>
                        <div class="form-group col">
                            <label for="fullname">Nome *</label>
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                placeholder="Ex: Sistema Tático de Apoio Operacional" value="">
                        </div>
                        <div class="form-group col">
                            <label for="applink">Link</label>
                            <input type="text" class="form-control" id="applink" name="applink"
                                placeholder="Ex: sistao.3bsup.eb.mil.br" value="">
                        </div>
                        <div class="form-group col">
                            <label for="input_user">input-usuario</label>
                            <input type="text" class="form-control" id="input_user" name="input_user" placeholder="Ex: user"
                                value="">
                        </div>

                        <div class="form-group col">
                            <label for="input_pass">input-senha</label>
                            <input type="text" class="form-control" id="input_pass" name="input_pass"
                                placeholder="Ex: password" value="">
                        </div>
                        <div class="row">
                            <div class="custom-control custom-checkbox m-r-30">
                                <input class="custom-control-input" type="radio" id="pspecial1" name='appspecial' value="1">
                                <label for="pspecial1" class="custom-control-label">Especial (SGTTE)</label>
                            </div>
                            <div class="custom-control custom-checkbox m-r-30">
                                <input class="custom-control-input" type="radio" id="pspecial2" name='appspecial' value="2">
                                <label for="pspecial2" class="custom-control-label">Link</label>
                            </div>
                            <div class="custom-control custom-checkbox m-r-30">
                                <input class="custom-control-input" type="radio" id="pspecial4" name='appspecial' value="3">
                                <label for="pspecial4" class="custom-control-label">Vinculado</label>
                            </div>
                            <div class="custom-control custom-checkbox m-r-30">
                                <input class="custom-control-input" type="radio" id="pspecial3" name='appspecial' value="0">
                                <label for="pspecial3" class="custom-control-label">Simples</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button onclick="return edit_app()" class="btn btn-success">Atualizar</button>

                </div>
            </div>
        </div>
    </div>
    {{-- Modal criar app --}}
    <div class="modal fade" id="add_app" tabindex="-1" role="dialog" aria-labelledby="add_app" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_appLabel">Adicionar aplicação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group col">
                            <label for="abbreviation_app">Sigla *</label>
                            <input type="text" class="form-control" id="abbreviation_app" name="abbreviation_app"
                                placeholder="Ex: SisTAO" value="">
                        </div>
                        <div class="form-group col">
                            <label for="full_name">Nome *</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                placeholder="Ex: Sistema Tático de Apoio Operacional" value="">
                        </div>
                        <div class="form-group col">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link"
                                placeholder="Ex: sistao.3bsup.eb.mil.br" value="">
                        </div>

                        <div class="form-group col">
                            <label for="inputUser">input-usuario</label>
                            <input type="text" class="form-control" id="inputUser" name="inputUser" placeholder="Ex: user"
                                value="">
                        </div>

                        <div class="form-group col">
                            <label for="inputPass">input-senha</label>
                            <input type="text" class="form-control" id="inputPass" name="inputPass"
                                placeholder="Ex: password" value="">
                        </div>
                        <div class="row">
                            <div class="custom-control custom-checkbox m-r-30">
                                <input class="custom-control-input" type="radio" id="special1" name='special' value="1">
                                <label for="special1" class="custom-control-label">Especial (SGTTE)</label>
                            </div>
                            <div class="custom-control custom-checkbox m-r-30">
                                <input class="custom-control-input" type="radio" id="special2" name='special' value="2">
                                <label for="special2" class="custom-control-label">Link</label>
                            </div>
                            <div class="custom-control custom-checkbox m-r-30">
                                <input class="custom-control-input" type="radio" id="special4" name='special' value="3">
                                <label for="special4" class="custom-control-label">Vinculado</label>
                            </div>
                            <div class="custom-control custom-checkbox m-r-30">
                                <input class="custom-control-input" type="radio" id="special3" name='special' value="">
                                <label for="special3" class="custom-control-label">Simples</label>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button onclick="return create_app()" class="btn btn-success">Adicionar</button>

                </div>
            </div>
        </div>
    </div>
@endsection
