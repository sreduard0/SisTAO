function validar() {

    // JavaScript Document
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    var OldPwd = form_alt_pwd.oldPwd.value;
    var NewPwd = form_alt_pwd.newPwd.value;
    var ConfNewPwd = form_alt_pwd.confNewPwd.value;

    if (OldPwd == "" || NewPwd == "" || ConfNewPwd == "") {
        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp É necessário preencher todos os campos. '
        });




        form_alt_pwd.oldPwd.focus();
        form_alt_pwd.newPwd.focus();
        form_alt_pwd.confNewPwd.focus();

        return false;
    }
    if (NewPwd != ConfNewPwd) {
        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Os campos "Nova senha" e "Confirmar senha" devem ser iguais.'
        });
        return false;
    }

    return true;
}