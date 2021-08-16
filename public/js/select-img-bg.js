function alt_img_bg() {
    // var do toast de sucesso
var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000
});
// fim

    var dados = {
        img_selected: $('input[name=bg]:checked').attr('value'),
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "http://sistao.3bsup.eb.mil.br/alt_img_bg",
        type: "POST",
        data: dados,
        dataType: 'text',

        success: function(data) {
            $('#uploadimageModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: '&nbsp&nbsp Imagem alterada com sucesso.'
            });
            document.getElementById("img_bg").style = "background: url('http://sistao.3bsup.eb.mil.br/" + dados.img_selected + "') center center;background-size:100%"
        }
    });


}
