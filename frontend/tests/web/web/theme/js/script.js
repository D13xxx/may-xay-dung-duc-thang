 $(".click_tabs ul li").each(function(index){
    $(this).click(function(){
      if(!$(this).hasClass("active")){
        $(".click_tabs ul li").each(function(){
          if($(this).hasClass("active")){
            $(this).removeClass("active");
          }
        });
        $(this).addClass("active");
         $(".content_tabs .items").each(function(indexs){
            if($(this).hasClass("active")){
              $(this).removeClass("active");
            }
         });
          $(".content_tabs .items").each(function(indexs){
            if(indexs==index){
              $(this).addClass("active");
            }
          });
      }

    });
 });
 $(".next_btn_1").click(function(){
     $(".click_tabs ul li").each(function(index){
      if($(this).hasClass("active")){
       
        if(index+2<=$(".click_tabs ul li").length+2){
             $(this).removeClass("active");
             $(".click_tabs ul li:nth-child("+(index+2)+")").addClass("active");
            return false;
        }

     }
    });
       $(".content_tabs .items").each(function(indexs){
            if($(this).hasClass("active")){
              $(this).removeClass("active");
            }
         });
   $(".click_tabs ul li").each(function(index){
     if($(this).hasClass("active")){
       $(".content_tabs .items").each(function(indexs){
          if(indexs==index){
              $(this).addClass("active");
            }
       });
       }
   });
 });
$(".target ul li").each(function(index){
    $(this).click(function(){
       $(".list_menu_body").each(function(indexs){
          if(index==indexs){
             $("html, body").animate({
              scrollTop:  $(this).offset().top-200
          }, 1200);
         }
     });

   });
});
$(".popup_service .box_tabs  ul li").each(function(index){
        $(this).click(function(){
          $(".popup_service .box_tabs  ul li").each(function(){
            if($(this).hasClass("active")){
               $(this).removeClass("active");
            }
          });
          $(this).addClass("active");
          $(".content-tab").each(function(){
            if($(this).hasClass("active")){
               $(this).removeClass("active");
            }
          });
           $(".content-tab").each(function(indexs){

             if(index==indexs){
               $(this).addClass("active");
            }
             
           });
        });
 });
$(window).scroll(function () {

  if($(window).scrollTop()>=$(".main").offset().top){
     if(!$(".menu_in").hasClass("fix")){
        $(".menu_in").addClass("fix");
    }
}
else{
    if($(".menu_in").hasClass("fix")){
        $(".menu_in").removeClass("fix");
    }
}
$(".list_menu_body").each(function(index){
    if($(window).scrollTop()>($(this).offset().top)-150){
          $(".target ul li").each(function(){
            if($(this).hasClass("active")){
               $(this).removeClass("active");
           }
       });
          $(".target ul li").each(function(indexs){
           if(index==indexs){
              $(this).addClass("active");
          }
      });
    }
});
$(".fixs .fa").click(function(){
 $(".exteriors ").hide();
});
$(".exterior .item").click(function(){
    $(".exteriors ").show();
});
$(".fixs .fa").click(function(){
 $(".furnitures ").hide();
});
$(".furniture .item").click(function(){
    $(".furnitures ").show();
});
$(".fixs .fa").click(function(){
 $(".functions_slides ").hide();
});
$(".slide_fs1 .item").click(function(){
    $(".functions_slides ").show();
});
$(".fixs .fa").click(function(){
 $(".slide_fss2 ").hide();
});
$(".slide_fs2 .item").click(function(){
    $(".slide_fss2 ").show();
});
$(".fixs .fa").click(function(){
 $(".slide_fss3 ").hide();
});
$(".slide_fs3 .item").click(function(){
    $(".slide_fss3 ").show();
});
$(".fixs .fa").click(function(){
 $(".slide_fss4 ").hide();
});
$(".slide_fs4 .item").click(function(){
    $(".slide_fss4 ").show();
});
$(".fixs .fa").click(function(){
 $(".slide_fss5 ").hide();
});
$(".slide_fs5 .item").click(function(){
    $(".slide_fss5 ").show();
});
$(".functions .content ul li").each(function(index){
 $(this).click(function(){
   $(".functions .content ul li").each(function(){
     if($(this).hasClass("active")){
        $(this).removeClass("active");
    }
});
   $(".functions .contents .list_content").each(function(){
      if($(this).hasClass("active")){
        $(this).removeClass("active");
    }
});
   $(this).addClass("active");
   $(".functions .contents .list_content").each(function(indexs){
     if(index==indexs){
        $(this).addClass("active");
    }
});
   return false;
});

});







});
$(".policyss .tabs  ul li").each(function(index){
         $(this).click(function(){
           $(".policyss .tabs  ul li").each(function(){
             if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(".policyss  .content_item .item").each(function(){
              if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(this).addClass("active");
           $(".policyss .content_item .item").each(function(indexs){
             if(index==indexs){
                $(this).addClass("active");
            }
        });
           return false;
        });
    });
    $(".policys .tabs  ul li").each(function(index){
         $(this).click(function(){
           $(".policys .tabs  ul li").each(function(){
             if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(".policys  .content_item .item").each(function(){
              if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(this).addClass("active");
           $(".policys .content_item .item").each(function(indexs){
             if(index==indexs){
                $(this).addClass("active");
            }
        });
           return false;
        });
    });
    $(".check .tabs  ul li").each(function(index){
         $(this).click(function(){
           $(".check .tabs  ul li").each(function(){
             if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(".check  .content_item .item").each(function(){
              if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(this).addClass("active");
           $(".check .content_item .item").each(function(indexs){
             if(index==indexs){
                $(this).addClass("active");
            }
        });
           return false;
        });
    });
    $(".policy .tabs  ul li").each(function(index){
         $(this).click(function(){
           $(".policy .tabs  ul li").each(function(){
             if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(".policy  .content_item .item").each(function(){
              if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(this).addClass("active");
           $(".policy .content_item .item").each(function(indexs){
             if(index==indexs){
                $(this).addClass("active");
            }
        });
           return false;
        });
    });
     $(".policysss .tabs  ul li").each(function(index){
         $(this).click(function(){
           $(".policysss .tabs  ul li").each(function(){
             if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(".policysss  .content_item .item").each(function(){
              if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(this).addClass("active");
           $(".policysss .content_item .item").each(function(indexs){
             if(index==indexs){
                $(this).addClass("active");
            }
        });
           return false;
        });
    });
        $(".specifications .content ul li").each(function(index){
         $(this).click(function(){
           $(".specifications .content ul li").each(function(){
             if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(".specifications .contents .list_content").each(function(){
              if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(this).addClass("active");
           $(".specifications .contents .list_content").each(function(indexs){
             if(index==indexs){
                $(this).addClass("active");
            }
        });
           return false;
        });
    });

    $(".accessories .content ul li").each(function(index){
         $(this).click(function(){
           $(".accessories .content ul li").each(function(){
             if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(".accessories .contents .list_content").each(function(){
              if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(this).addClass("active");
           $(".accessories .contents .list_content").each(function(indexs){
             if(index==indexs){
                $(this).addClass("active");
            }
        });
           return false;
        });
    });
    $(".popup_service .fa").click(function(){
        $(".dichvu").hide(230);
    });
    $(".policyss .content_item .content_text").each(function(){
        $(this).click(function(){
          $(".dichvu").css("display","block");
          var id=$(this).attr("id");
          $(".dichvu .popup_service").each(function(){
              if($(this).hasClass("active")){
                  $(this).removeClass("active");
                }
          });
            $(".dichvu .popup_service").each(function(){
                if($(this).attr("data_id")==id){
                  $(this).addClass("active");
                }
            });
        });
    });
    $(" .hidens .link_page a").click(function(){
         $(" .hiden").each(function(){
          $(this).toggle(100);

        });
         if($(this).hasClass("active")){
           $(this).removeClass("active");
           $(this).text("Xem thêm");
         }
         else{
          $(this).addClass("active");
          $(this).text("Thu gọn");
         }
       
    });
 $(".list_menu ul li").each(function(index){
         $(this).click(function(){
           $(".list_menu ul li").each(function(){
             if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(" .list_content_menu .item_menu").each(function(){
              if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
        });
           $(this).addClass("active");
           $(".list_content_menu .item_menu").each(function(indexs){
             if(index==indexs){
                $(this).addClass("active");
            }
        });
           return false;
        });
    });
 
 $(".list_fo").each(function(){
    $(this).click(function(){
      var id=$(this).attr("id");
      $(".fixss").css("display","block");
      $(".fixss .fixs_img").each(function(){
        if($(this).hasClass("active"))
          {
            $(this).removeClass("active");
          }
      });
      $(".fixss .fixs_img").each(function(){
        if($(this).attr("data_id")==id){
          $(this).addClass("active");
        }
      });
    });
 });
 $(".list_car").change(function(){
      var id_car=$(this).val();
      // $(".list_content").each(function(){
      //   if($(this).hasClass("active"))
      //         {
      //           $(this).removeClass("active");
      //         }
      // });
      //  $(".list_content").each(function(){
      //     if(id_car==$(this).attr("id")){
      //     $(this).addClass("active");
      //     }
      //  });
      //  $("#"+id_car+" .list_menu ul li").each(function(){
      //      if($(this).hasClass("active"))
      //         {
      //           $(this).removeClass("active");
      //         }
      //  });
      //   $("#"+id_car+" .item_menu").each(function(){
      //      if($(this).hasClass("active"))
      //         {
      //           $(this).removeClass("active");
      //         }
      //  });
      // $("#"+id_car+" .list_menu ul li:first-child").addClass("active");
      //  $("#"+id_car+" .item_menu:first-child").addClass("active");
 });
 $(".popup_for_check .item .fa").click(function(){
      $(".popup_for_check").css("display","none");
 });
  $(".fixss  .fixs_img .fa ").click(function(){
      $(".fixss").css("display","none");
 });
 $(".item .data").each(function(index){
    $(this).click(function(){
        $(".popup_for_check").css("display","block");
        var id=$(this).attr("id");
        $(".popup_for_check .item").each(function(){
            if($(this).hasClass("active")){
              $(this).removeClass("active")
            }
        });
        $(".popup_for_check .item").each(function(){
            if(id==$(this).attr("data_id")){
              $(this).addClass("active")
            }
        });
    });
 });

 $(".car_full .content_list .list_filter h3").click(function(){
    $(this).toggleClass("active");
    $(this).next("ul").slideToggle();
 });