// ===================== CRUD APPS
function confirm_delete_app(id, name) {
       var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    bootbox.confirm({
        title: ' Deseja mesmo excluir '+name+'?',
        message: '<strong>Essa operação não pode ser desfeita!</strong> <br> Confirmando a exclusão de '+name+', todos os dados contidos deste aplicativo serão excluidos permanentementes, sem possibilidade de restaura-los.',
        callback: function(confirmacao) {

            if (confirmacao)
            $.ajax({
                url: "http://sistao.3bsup.eb.mil.br/apps/delete/"+id,
                type: "GET",
                success: function(data) {
                   $("#table_apps").DataTable().clear().draw(6);
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Aplicação excluida com sucesso.'
                    });

                },
                 error: function(data) {
                    Toast.fire({
                        icon: 'error',
                        title: '&nbsp&nbsp Erro ao excluir aplicação'
                    });

                }
            });
        },
        buttons: {
            cancel: {
                label: 'Cancelar',
                className: 'btn-default'
            },
            confirm: {
                label: 'EXCLUIR',
                className: 'btn-danger'
            }

        }
    });
}

function create_app() {
       var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });


    var data = {
        abbreviation_app: $('input[name=abbreviation_app]').val(),
        full_name: $('input[name=full_name]').val(),
        link: $('input[name=link]').val(),
        special: $('input[name=special]:checked').attr('value'),
    };


    if (data.abbreviation_app == "" || data.full_name == "") {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Os campos Sigla e Nome são obrigatórios. '
        });

        return false;
    }


    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: 'http://sistao.3bsup.eb.mil.br/apps_add',
        type: 'POST',
        data: data,
        dataType: 'text',


        success: function (data) {
            $("#add_app").modal('hide');
            $("#table_apps").DataTable().clear().draw(6);
            Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Aplicação criada com sucesso.'
            });
            $(":input").val("");
        },

        error: function (data) {
             Toast.fire({
                        icon: 'error',
                        title: '&nbsp&nbsp Erro ao criar aolicação.'
                    });
        }
    });
}


function edit_app() {
       var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });


    var data = {
        id: $('input[name=id]').val(),
        abbreviation_app: $('input[name=abbreviationApp]').val(),
        full_name: $('input[name=fullname]').val(),
        link: $('input[name=applink]').val(),
        special: $('input[name=appspecial]:checked').attr('value'),
    };


    if (data.abbreviation_app == "" || data.full_name == "") {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Os campos Sigla e Nome são obrigatórios. '
        });

        return false;
    }


    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: 'http://sistao.3bsup.eb.mil.br/app_edit',
        type: 'POST',
        data: data,
        dataType: 'text',


        success: function (data) {
            $("#edit_app").modal('hide');
            $("#table_apps").DataTable().clear().draw(6);
            Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Deu bom'
            });
        },

        error: function (data) {
             Toast.fire({
                        icon: 'error',
                        title: '&nbsp&nbsp Deu ruim'
                    });
        }
    });

    // ===================== CRUD APPS
}




