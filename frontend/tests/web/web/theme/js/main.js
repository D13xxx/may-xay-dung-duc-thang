$(document).ready(function() {
    "use strict";
    // $('select').niceSelect();
    // $('.scroll-to-top').click(function(){
    //     $('html, body').animate({scrollTop : 0},800);
    //     return false;
    // });
    // end
    $(".btn-video-banner, .bt-menu-trigger, .overlay-btn").click(function(){
        $(".overlay").addClass("show-overlay");
        var getSrc = $(".overlay").attr('src');
        $(".overlay").find(".show-iframe").html('<iframe src="" frameborder="0" allowfullscreen></iframe>'); 
        $(".show-iframe iframe").attr("src", getSrc);
    });
    $(".bt-menu-trigger, .overlay-btn").click(function(){
        $(".overlay").removeClass("show-overlay");
        $(".show-iframe iframe").attr("src", "");
    });
    // creat menu sidebar
    $(".menu-bar-lv-1").each(function(){
        $(this).find(".span-lv-1").click(function(){
            $(this).toggleClass('rotate-menu');
            $(this).parent().find(".menu-bar-lv-2").toggle(500);
        });
    });
    $(".menu-bar-lv-2").each(function(){
        $(this).find(".span-lv-2").click(function(){
            $(this).toggleClass('rotate-menu');
            $(this).parent().find(".menu-bar-lv-3").toggle(500);
        });
    });
    $(".shadow-open-menu").click(function() {
        $('.menu-bar-mobile').fadeOut();
        $(".shadow-open-menu").fadeOut();
        $(".menu-btn-show").toggleClass("active");
    });
    $(".menu-btn-show").click(function() {
        $(this).toggleClass("active");
        $('.menu-bar-mobile').fadeToggle(500);
        $(".shadow-open-menu").fadeToggle(500);
    });
    $(".categories-menu").each(function(){
        $(this).find(".fa-minus").click(function(){
            $(this).toggleClass("fa-plus");
            $(this).parent().parent().find(".group-check-box").toggleClass("active");
        });
    });
    $('.scroll-top-btn').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
    $("#billtoship").click(function () {
        $('.steps-hoso').toggle(500);
    });
    (function ($) {
        $.fn.clickToggle = function (func1, func2) {
            var funcs = [func1, func2];
            this.data('toggleclicked', 0);
            this.click(function () {
                var data = $(this).data();
                var tc = data.toggleclicked;
                $.proxy(funcs[tc], this)();
                data.toggleclicked = (tc + 1) % 2;
            });
            return this;
        };
    }(jQuery));
    $(document).ready(function () {

        $('.dropdown-toggle').clickToggle(function () {
            $(this).next().css('display', 'block');
        }, function () {
            $(this).next().css('display', 'none');
        });
    });
    // end
});

function switchDrop(number) {
    $('#drop-1, #drop-2, #drop-3').hide();

    if (number === 2) {
        $('#drop-2').show();
    }

    if (number === 3) {
        $('#drop-3').show();
    }
}

function backDrop1() {
    $('#drop-2, #drop-3').hide();
    $('#drop-1').show();
}