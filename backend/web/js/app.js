$(function() {
    "use strict";

    $('body').on('click', '.hmuPopUp', function (){
        var left  = ($(window).width()/2)-(660/2),
            top   = ($(window).height()/2)-(460/2),
            popup = window.open ($(this).attr( "href"), 'hmuPopUp', "width=700, height=500, top="+top+", left="+left);
        if (window.focus) {popup.focus()}
        return false;
    });

})
