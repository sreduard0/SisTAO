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
        $('#btn-submit').html('<button class="m-l-5 btn btn-success">Salvar</button>');
    }



});

function hide() {
    document.getElementById("info_user").style.display = "none";
    $('#info_user').each(function() {
        $(this).removeClass('show');
    })
    $("#backdrop").detach();
}


function toggleFAB(fab) {
    if (document.querySelector(fab).classList.contains('show')) {
        document.querySelector(fab).classList.remove('show');
    } else {
        document.querySelector(fab).classList.add('show');
    }
}

document.querySelector('.fab .main').addEventListener('click', function() {
    toggleFAB('.fab');
});

document.querySelectorAll('.fab ul li button').forEach((item) => {
    item.addEventListener('click', function() {
        toggleFAB('.fab');
    });
});