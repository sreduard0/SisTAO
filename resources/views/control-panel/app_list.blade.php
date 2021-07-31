@extends('control-panel.layout.layout_control_panel')
@section('title', 'Lista de aplicativos')
@section('adm', 'active')
@section('menu_adm_open', 'menu-open')
@section('apps', 'active')
@section('scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/confirm-delete.js') }}"></script>
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
                                            <th width="100px">Ação</th>
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
            $("#table_apps").DataTable({
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
@endsection
@section('modal')
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
                    <form method="post" action="{{ route('add_application') }}">
                        @csrf
                        <div class="form-group col">
                            <label for="abbreviation_app">Sigla</label>
                            <input type="text" class="form-control" id="abbreviation_app" name="abbreviation_app"
                                placeholder="Ex: SisTAO" value="">
                        </div>
                        <div class="form-group col">
                            <label for="full_name">Nome</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                placeholder="Ex: Sistema Tático de Apoio Operacional" value="">
                        </div>
                        <div class="form-group col">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link"
                                placeholder="Ex: sistao.3bsup.eb.mil.br" value="">
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
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
