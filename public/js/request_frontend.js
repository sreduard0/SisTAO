// JavaScript Document
var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
});

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


// function check_create_user() {

//     // JavaScript Document
//     var Toast = Swal.mixin({
//         toast: true,
//         position: 'top-end',
//         showConfirmButton: false,
//         timer: 5000
//     });

//     var Name = create_user.name.value;
//     var ProfessionalName = create_user.professional_name.value;
//     var Email = create_user.email.value;
//     var Phone1 = create_user.phone1.value;
//     var Phone2 = create_user.phone2.value;
//     var BornAt = create_user.born_at.value;
//     var MotherName = create_user.mother_name.value;
//     var FatherName = create_user.father_name.value;
//     var MilitaryId = create_user.military_id.value;
//     var Cpf = create_user.cpf.value;
//     var Street = create_user.street.value;
//     var HouseNumber = create_user.house_number.value;
//     var District = create_user.district.value;
//     var CityId = create_user.city_id.value;
//     var Cep = create_user.cep.value;
//     var DepartamentId = create_user.departament_id.value;
//     var RankId = create_user.rank_id.value;
//     var CompanyId = create_user.company_id.value;


//     if (
//         Name == "" ||
//         ProfessionalName == "" ||
//         Email == "" ||
//         Phone1 == "" ||
//         Phone2 == "" ||
//         BornAt == "" ||
//         MotherName == "" ||
//         FatherName == "" ||
//         MilitaryId == "" ||
//         Cpf == "" ||
//         Street == "" ||
//         HouseNumber == "" ||
//         District == "" ||
//         CityId == "" ||
//         Cep == "" ||
//         DepartamentId == "" ||
//         RankId == "" ||
//         CompanyId == ""
//     ) {

//         Toast.fire({
//             icon: 'error',
//             title: '&nbsp&nbsp É necessário preencher todos os campos. '
//         });



//         create_user.name.focus();
//         create_user.professional_name.focus();
//         create_user.email.focus();
//         create_user.phone1.focus();
//         create_user.phone2.focus();
//         create_user.mother_name.focus();
//         create_user.father_name.focus();
//         create_user.military_id.focus();
//         create_user.cpf.focus();
//         create_user.street.focus();
//         create_user.house_number.focus();
//         create_user.district.focus();
//         create_user.city_id.focus();
//         create_user.cep.focus();
//         create_user.departament_id.focus();
//         create_user.rank_id.focus();
//         create_user.company_id.focus();

//         return false;
//     }

//     return true;
// }