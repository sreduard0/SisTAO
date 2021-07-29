$(document).ready(function() {
    //    PREENCHE NOME DE GUERRA NO CABEÇALHO
    $("#professional_name").keyup(function() {
        // Getting the current value of textarea
        var currentText = $(this).val();

        setTimeout(function() { $("#professionalName").text(currentText); }, 800)



    });

    // PREENCHE P/G NO CABEÇALHO
    var select = document.querySelector('#rank_id');
    select.addEventListener('change', function() {
        var option = this.selectedOptions[0];
        var currentText = option.textContent;


        // Setting the Div content
        $("#rankAbbr").slideUp(0).fadeIn(400).text(currentText);
    });

    //    PREENCHE SEÇÃO NO CABEÇALHO
    var select = document.querySelector('#departament_id');
    select.addEventListener('change', function() {
        var option = this.selectedOptions[0];
        var currentText = option.textContent;


        // Setting the Div content
        $("#departamentId").slideUp(0).fadeIn(400).text(currentText);
    });




    //===================== Tela add aplicação =============================


    //    PREENCHE SEÇÃO NO CABEÇALHO
    var select = document.querySelector('#appName');
    select.addEventListener('change', function() {
        var option = this.selectedOptions[0];
        var currentText = option.textContent;


        // Setting the Div content
        $("#nameApp").slideUp(0).fadeIn(400).text(currentText);
    });



});
