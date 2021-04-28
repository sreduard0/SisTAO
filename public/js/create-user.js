
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })


})(jQuery);

function hide() {
    document.getElementById("info_user").style.display = "none";
    $('#info_user').each(function(){
        $(this).removeClass('show');
    })
    $("#backdrop").detach();
}

