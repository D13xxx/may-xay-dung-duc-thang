$('.slider_main').owlCarousel({
    items: 1, // item suốt hiện
    // animateOut: 'fadeOut', // các dang chuyển slid
    loop: true, // muốn lặp lại thì true
    margin:0,
    nav:false, // nút next và prex nếu true
    dots:true, // nút bấm conm con ở giữa silder nếu la true
    autoplay:true, // có auto chạy k
    autoplayTimeout:4000, // thời gian chuyển slider
    smartSpeed:250 // thời gian mà ảnh 1 chuyển ảnh 2 sẽ mất bao nhiêu thời gian
});

$('.slider-doi-tac').owlCarousel({
    items: 12, // item suốt hiện
    // animateOut: 'fadeOut', // các dang chuyển slid
    loop: true, // muốn lặp lại thì true
    margin:0,
    // nav:false, // nút next và prex nếu true
    // dots:true, // nút bấm conm con ở giữa silder nếu la true
    autoplay:true, // có auto chạy k
    autoplayTimeout:4000, // thời gian chuyển slider
    smartSpeed:250 // thời gian mà ảnh 1 chuyển ảnh 2 sẽ mất bao nhiêu thời gian
});