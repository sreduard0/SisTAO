@extends('control-panel.layout.layout_control_panel')
@section('title', 'Alterar senha')
@section('adm', 'active')
@section('menu_adm_open', 'menu-open')
@section('users', 'active')
@section('scripts')
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
                            Lista de usuários
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
                                <table id="table_users" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>P/G</th>
                                            <th>Nome de guerra</th>
                                            <th>CIA</th>
                                            <th>Seção</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td data-order="{{ $user->rank->id }}">{{ $user->rank->rank }}</td>
                                                <td>{{ $user->professionalName }}</td>
                                                <td>{{ $user->company->name }}</td>
                                                <td> {{ $user->departament->name }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-success"><i class="fa fa-pen"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
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
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="plugins/datatables/numeric-comma.js"></script>


    <script>
        $(function() {
            $("#table_users").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "language": {
                    "url": "plugins/datatables/Portuguese.json"
                },
                columnDefs: [{
                    type: 'numeric-comma',
                    targets: 0
                }],


                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });

    </script>
@endsection
