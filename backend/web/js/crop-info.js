// $(document).ready(function(){
//     // image default 200*200
//     var image_crop_pro = $('#imagePro').croppie({
//         enableExif: false,
//         viewport: {
//             width:400,
//             height:400,
//             type:'square' //circle
//         },
//         boundary:{
//             width:100 + '%',
//             height:400
//         }
//     });

//     $('#upload').on('change', function(){
//         var reader = new FileReader();
//         reader.onload = function (event) {
//             event.preventDefault()
//             image_crop_pro.croppie('bind', {
//                 url: event.target.result
//             }).then(function(){
//                 console.log('jQuery bind complete');
//             });
//         }
//         reader.readAsDataURL(this.files[0]);
//         $('#myModal').modal('show');
//     });

//     $('.crop_image').click(function(event){
//         var fake_path = document.getElementById('upload').value;
//         image_crop_pro.croppie('result', {
//             type: 'canvas',
//             size: 'viewport'
//         }).then(function(response){
//             $('#myModal').modal('hide');
//             $('.avatarPro').attr('src',response);
//             $('#dataUpload').attr('value',fake_path.split("\\").pop() +'+'+ response);
//         })
//     });

// });
