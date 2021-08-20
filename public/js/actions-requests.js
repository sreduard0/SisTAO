function cancel_request(id, name) {
       var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    bootbox.confirm({
        title: ' Deseja mesmo excluir '+name+'?',
        message: '<strong>Essa operação não pode ser desfeita!</strong> <br> Confirmando a exclusão de '+name+', todos os dados contidos deste usuário serão excluidos permanentementes, sem possibilidade de restaura-los.',
        callback: function(confirmacao) {

            if (confirmacao)
            $.ajax({
                url: "http://sistao.3bsup.eb.mil.br/request/delete/"+id,
                type: "GET",
                success: function(data) {
                   $("#table_requests").DataTable().clear().draw(6);
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Solicitação excluida com sucesso.'
                    });

                },
                 error: function(data) {
                    Toast.fire({
                        icon: 'error',
                        title: '&nbsp&nbsp Erro ao excluir solicitação'
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
