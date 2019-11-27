var app = {
  // Application Constructor
  init: function() {
    this.rebuildVinaHome();

    $(window)
      .scroll(function() {
        var fixsp = $(".check");
        var offset = fixsp.offset();
        var sco = window.scrollY;
        var check = offset.top;
        // console.log(sco);
        // console.log(check);
        if (sco > check - 81 && sco>0) {
          $("#menu").addClass("fixed_menu");
        } else {
          $("#menu").removeClass("fixed_menu");
        }
      })
      .scroll();

      $( ".navbar-toggler" ).click(function() {
        $(".navbar-toggler").toggleClass("close-menu");
      });

      $( "#view-more").click(function() {
        $(".detail").addClass("detail-full");
        $( "#view-more").hide();
      });
      
  },
  // Bind Event Listeners
  //
  // Bind any events that are required on startup. Common events are:
  // 'load', 'deviceready', 'offline', and 'online'.
  rebuildVinaHome: function() {
    var cw = $(".vinahome").width();
    $(".vinahome").css({ height: cw + "px" });
  },
  buildSliderProduct: function() {
    var owlNews = $(".slider_p");
    owlNews.owlCarousel({
      loop: true,
      margin: 0,
      responsiveClass: true,
      lazyLoad: true,
      nav: false,
      dots: false,
      responsive: {
        0: {
          items: 2,
          nav: true
        },
        600: {
          items: 3,
          nav: true
        },
        1000: {
          items: 4,
          nav: true
        },
        1600: {
          items: 5,
          nav: true,
          margin: 0
        }
      }
    });
    $(".nextBtnNews").click(function() {
      owlNews.trigger("next.owl.carousel");
    });
    $(".previousNews").click(function() {
      owlNews.trigger("prev.owl.carousel");
    });
  },
  buildSliderCustomer: function() {
    // check onrisize buld vinahome icon
    $(window).resize(function() {
      var cw = $(".vinahome").width();
      $(".vinahome").css({ height: cw + "px" });
    });

    //build slider customer
    $(".slider_customers").owlCarousel({
      items: 3,
      animateOut: "fadeOut",
      smartSpeed: 450,
      autoplayHoverPause: true,
      loop: true,
      margin: 15,
      nav: false,
      dots: true,
      autoplay: true,
      autoplayTimeout: 4000,
      responsive: {
        0: {
          items: 1,
          nav: true,
          margin: 35,
        },
        600: {
          items: 2,
          nav: true
        },
        1000: {
          items: 3,
          nav: true
        }
      }
    });
  },
  buildSliderNews: function() {
    $(".slide-select-services-now").owlCarousel({
      items: 1,
      // animateOut: 'fadeOut',
      loop: true,
      margin: 15,
      nav: false,
      dots: true,
      autoplay: true,
      autoplayTimeout: 400000,
      autoplayHoverPause: true,
      smartSpeed: 250,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 2,
          nav: true
        },
        1000: {
          items: 3,
          nav: true,
          margin: 35,
        },
        1600: {
          items: 5,
          nav: true
        }
      }
    });
  },
  buildSliderBanner: function() {
    $(".slider_banner").owlCarousel({
      items: 1,
      animateOut: "fadeOut",
      loop: true,
      margin: 15,
      nav: false,
      dots: true,
      autoplay: true,
      autoplayTimeout: 4000,
      autoplayHoverPause: true,
      smartSpeed: 250,
      navText: [
        "<i class='fa fa-chevron-left' aria-hidden='true'></i>",
        "<i class='fa fa-chevron-right' aria-hidden='true'></i>"
      ]
    });
  }
};
