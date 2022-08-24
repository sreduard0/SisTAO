function check_info_user() {

    // JavaScript Document
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    var Name = info_user.name.value;
    var ProfessionalName = info_user.professional_name.value;
    var Email = info_user.email.value;
    var Phone1 = info_user.phone1.value;
    var Phone2 = info_user.phone2.value;
    var BornAt = info_user.born_at.value;
    var MotherName = info_user.mother_name.value;
    var IdtMil = info_user.idt_mil.value;
    var Street = info_user.street.value;
    var HouseNumber = info_user.house_number.value;
    var District = info_user.district.value;
    var CityId = info_user.city.value;
    var Cep = info_user.cep.value;
    var DepartamentId = info_user.departament_id.value;
    var RankId = info_user.rank_id.value;
    var CompanyId = info_user.company_id.value;


    if (Name == "" || ProfessionalName == "" || Email == "" || Phone1 == "" || Phone2 == "" || BornAt == "" || IdtMil == "" || Street == "" || HouseNumber == "" || District == "" || CityId == "" || Cep == "" || MotherName == "" || DepartamentId == "" || RankId == "" || CompanyId == "") {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp É necessário preencher todos os campos. '
        });

        info_user.name.focus();
        info_user.professional_name.focus();
        info_user.email.focus();
        info_user.phone1.focus();
        info_user.phone2.focus();
        info_user.born_at.focus();
        info_user.idt_mil.focus();
        info_user.street.focus();
        info_user.house_number.focus();
        info_user.district.focus();
        info_user.city.focus();
        info_user.cep.focus();
        info_user.departament_id.focus();
        info_user.rank_id.focus();
        info_user.company_id.focus();

        return false;
    }

    return true;
}


function check_create_user() {

    // JavaScript Document
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    var Name = info_user.name.value;
    var ProfessionalName = info_user.professional_name.value;
    var IdtMil = info_user.idt_mil.value;
    var DepartamentId = info_user.departament_id.value;
    var RankId = info_user.rank_id.value;
    var CompanyId = info_user.company_id.value;


    if (Name == "" || ProfessionalName == "" || IdtMil == "" || DepartamentId == "" || RankId == "" || CompanyId == "") {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp É necessário preencher todos os campos. '
        });

        info_user.name.focus();
        info_user.professional_name.focus();
        info_user.idt_mil.focus();
        info_user.departament_id.focus();
        info_user.rank_id.focus();
        info_user.company_id.focus();

        return false;
    }

    return true;
}

