$(document).ready(function(){
    // imageCat
    var image_crop_pro_cat = $('#imageCat').croppie({
        enableExif: false,
        viewport: {
            width:280,
            height:140,
            type:'square' //circle
        },
        boundary:{
            width:90 + '%',
            height:140
        }
    });
    
    $('#upload').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
            event.preventDefault()
            image_crop_pro_cat.croppie('bind', {
                url: event.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#myModal').modal('show');
    });
    
    $('.crop_image').click(function(event){
        var fake_path = document.getElementById('upload').value;
        image_crop_pro_cat.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response){
            $('#myModal').modal('hide');
            $('.avatarPro').attr('src',response);
            $('#dataUpload').attr('value',fake_path.split("\\").pop() +'+'+ response);
        })
    });

    //products
    var image_crop_pro = $('#imagePro').croppie({
        enableExif: false,
        viewport: {
            width:300,
            height:260,
            type:'square' //circle
        },
        boundary:{
            width:400,
            height:500
        }
    });

    $('#uploadPro').on('change', function(){

        var reader = new FileReader();
        reader.onload = function (event) {
            event.preventDefault()
            image_crop_pro.croppie('bind', {
                url: event.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#myModal').modal('show');
    });

    $('.crop_imagePro').click(function(event){
        var fake_path=document.getElementById('uploadPro').value;
        image_crop_pro.croppie('result', {
            type: 'canvas',
            size: {width:460,height:400},
            format:'jpeg'
        }).then(function(response){
            $('#myModal').modal('hide');
            $('.avatarPro').attr('src',response);
            $('#dataUploadPro').attr('value',fake_path.split("\\").pop() +'+'+ response);
        })
    });

    // img_share facebook
     //products
     var image_crop_proShare = $('#imageProShare').croppie({
        enableExif: false,
        viewport: {
            width:300,
            height:158,
            type:'square' //circle
        },
        boundary:{
            width:400,
            height:500
        }
    });

    $('#uploadProShare').on('change', function(){

        var reader = new FileReader();
        reader.onload = function (event) {
            event.preventDefault()
            image_crop_proShare.croppie('bind', {
                url: event.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#myModalShare').modal('show');
    });

    $('.crop_imageProShare').click(function(event){
        var fake_path=document.getElementById('uploadProShare').value;
        image_crop_proShare.croppie('result', {
            type: 'canvas',
            size: {width:600,height:315},
            format:'png'
        }).then(function(response){
            $('#myModalShare').modal('hide');
            $('.avatarProShare').attr('src',response);
            $('#dataUploadProShare').attr('value',fake_path.split("\\").pop() +'+'+ response);
        })
    });

    // info profile
    var image_crop_profile = $('#imageProFile').croppie({
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

        $('#uploadProFile').on('change', function(){

            var reader = new FileReader();
            reader.onload = function (event) {
                event.preventDefault()
                image_crop_profile.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#myModal').modal('show');
        });

        $('.crop_imageProFile').click(function(event){
            var fake_path=document.getElementById('uploadProFile').value;
            image_crop_profile.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $('#myModal').modal('hide');
                $('.avatarPro').attr('src',response);
                $('#dataUploadProFile').attr('value',fake_path.split("\\").pop() +'+'+ response);
            })
        });

});
