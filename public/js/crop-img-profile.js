$(document).ready(function() {

    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square' //circle
        },
        boundary: {
            width: 300,
            height: 300
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
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/upload_img_profile",
                type: "POST",
                data: { "img_profile": response },

                success: function(data) {
                    $('#uploadimageModal').modal('hide');

                    document.getElementById("img_profile").src = data;
                }
            });
        })
    });

});
