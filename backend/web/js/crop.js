$(document).ready(function(){
    var image_crop = $('#image').croppie({
        enableExif: false,
        viewport: {
            width:200,
            height:200,
            type:'square' //circle
        },
        boundary:{
            width:300,
            height:300
        }
    });

    $('#upload').on('change', function(){

        var reader = new FileReader();
        reader.onload = function (event) {
            event.preventDefault()
            image_crop.croppie('bind', {
                url: event.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#myModal').modal('show');
    });

    $('.crop_image').click(function(event){
        var fake_path=document.getElementById('upload').value;
        image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response){
            $('#myModal').modal('hide');
            $('.avatarPro').attr('src',response);
            $('#dataUpload').attr('value',fake_path.split("\\").pop() +'+'+ response);
        })
    });
});
