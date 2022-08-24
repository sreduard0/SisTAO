(function($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function() {
        $(this).on('blur', function() {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    })

    /*==================================================================
    [ Focus input   MODAL ALTERAR SENHA ]*/
    $('.input').each(function() {
        $(this).on('blur', function() {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            } else {
                $(this).removeClass('has-val');
            }
        })
    })

    /*==================================================================
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function() {
        if (showPass == 0) {
            $(this).next('input').attr('type', 'text');
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fa-eye-slash');
            showPass = 1;
        } else {
            $(this).next('input').attr('type', 'password');
            $(this).find('i').addClass('fa-eye');
            $(this).find('i').removeClass('fa-eye-slash');
            showPass = 0;
        }

    });

    // Ocultar erro apos 4s
    setTimeout(function() {
        $("#error").detach();
    }, 4000);
})(jQuery);


// Ativar form do campo editar perfil
var enabled = 0;
$('#enable-form').on('click', function() {
    if (enabled == 0) {
        $(this).removeClass('fa-user-edit');
        $(".form-control").prop("disabled", false);
        $('#btn-submit').html('<button type="submit" onclick="return check_info_user()" class="m-l-5 btn btn-success">Salvar</button>');
    }



});

function hide() {
    document.getElementById("info_user").style.display = "none";
    $('#info_user').each(function() {
        $(this).removeClass('show');
    })
    $("#backdrop").detach();
}

function hide2() {
    $("#info_login").detach();
    $("#backdrop").detach();
}
//


//===========Tema escuro=======
$(function () {
    var AltTheme = $("#theme"); //checkbox que ativara

    AltTheme.on('click', function () {
        if (AltTheme.prop('checked') == true) {
            $("body").addClass('dark-mode'); //mostra os as permissoes
            return save(1);

        } else if (AltTheme.prop('checked') == false) {
            $("body").removeClass('dark-mode'); //oculta os as permissoes
             return save(0);
        }
    });
});
function save(sts) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });
    $.ajax({



        url: window.location.origin+"/theme/"+sts,
        type: "GET",
        success: function(data) {
            Toast.fire({
                icon: 'success',
                title: '&nbsp&nbsp Tema alterado com sucesso. '
            });
        },
          error: function(data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Falha ao alterar tema. '
            });
        }
    });
}


