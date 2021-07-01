// var do toast de sucesso
var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000
});
// fim
function checkExt($input) {
    var extTrue = ['jpg', 'png', 'jpeg'];
    var extFile = $input.value.split('.').pop();

    if (typeof extTrue.find(function(ext) {
            return extFile == ext;
        }) == 'undefined') {

        Toast.fire({
            icon: 'error',
            title: '&nbsp&nbsp Por favor selecione um arquivo .JPG, .JPEG ou .PNG'
        });

        $input.value = '';
        return false;
    }
}
$(document).ready(function() {
    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 300,
            type: 'square' //circle
        },
        boundary: {
            width: 400,
            height: 400
        }
    });

    $('#upload_image').on('change', function() {
        var reader = new FileReader();
        reader.onload = function(event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#alt-img-profile').modal('hide');
        $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function(event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            var Id = info_user.id.value;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "http://sistao.3bsup.eb.mil.br/upload_img_profile",
                type: "POST",
                data: {
                    "img_profile": response,
                    "user_id": Id
                },

                success: function(data) {
                    $('#uploadimageModal').modal('hide');
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Imagem alterada com sucesso.'
                    });
                    document.getElementById("img_profile").src = 'http://sistao.3bsup.eb.mil.br/' + data;
                }
            });
        })
    });

});
