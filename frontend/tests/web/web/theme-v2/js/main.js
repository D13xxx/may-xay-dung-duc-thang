$('img.lazy-load').lazyload();

jQuery(document).ready(function($){
	if(window.matchMedia('(max-width: 1199px)').matches){
		$('.sort-select').on('click', function(){
			$(this).find('ul').slideToggle();
		});
	}
	if(window.matchMedia('(max-width: 991px)').matches){
		
	}

	if(window.matchMedia('(min-width: 1200px)').matches){
		$('.danh-muc-box').hover(function () {
			clearTimeout($.data(this, 'timer'));
			$(this).children('.danh-muc-menu').stop(true, true).slideDown();
		}, function () {
			$.data(this, 'timer', setTimeout($.proxy(function() {
				$(this).children('.danh-muc-menu').stop(true, true).slideUp();
			}, this), 100));
		});
	}

	/* ---------------------------------------------------------------------- */
	/*	View Menu
	/* ---------------------------------------------------------------------- */
	$('.view-menu').on('click', function(e){
		if($('.main-menu').is(':hidden')){
			$('.main-menu').slideDown();
			$(this).html('<i class="fa fa-times"></i>');
		}else{
			$('.main-menu').slideUp();
			$(this).html('<i class="fa fa-list"></i>');
		}
	});
	
	/* ---------------------------------------------------------------------- */
	/*	View Menu Sub
	/* ---------------------------------------------------------------------- */
	$('.main-menu > ul > li.li-parent > a').append('<span class="view-sub-menu"><i class="fa fa-chevron-down"></i></span>');
	$('.view-sub-menu').on('click', function(e){
		e.preventDefault();
		var subMenu = $(this).parents('li').find('ul');
		if($(subMenu).is(':hidden')){
			$(subMenu).slideDown();
			$(this).html('<i class="fa fa-chevron-up"></i>');
		}else{
			$(subMenu).slideUp();
			$(this).html('<i class="fa fa-chevron-down"></i>');
		}
	});
	
	/* ---------------------------------------------------------------------- */
	/*	View Search
	/* ---------------------------------------------------------------------- */
	$('.view-search').on('click', function(e){
		$('.search-box').slideToggle();
	});

	/* ---------------------------------------------------------------------- */
	/*	Zing Tab
	/* ---------------------------------------------------------------------- */
	$('.tab-header a').on('click', function(e){
		e.preventDefault();
		var id = $(this).attr('href');
		$(this).parents('.zing-tab').find('.tab-header a').removeClass('active');
		$(this).addClass('active');
		$(this).parents('.zing-tab').find('.tab-content .tab').hide();
		$(this).parents('.zing-tab').find('.tab-content '+id).fadeIn();
	});
	
	var clickElem = $('a.accord-link');
    clickElem.on('click', function(e){
        e.preventDefault();
        
        var $this = $(this),
            parentCheck = $this.parents('.accord-elem'),
            accordItems = $('.accord-elem'),
            accordContent = $('.accord-content');
            
        if( !parentCheck.hasClass('active')) {
            accordContent.slideUp(300, function(){
                accordItems.removeClass('active');
            });
            parentCheck.find('.accord-content').slideDown(300, function(){
                parentCheck.addClass('active');
            });
        } else {
            accordContent.slideUp(300, function(){
                accordItems.removeClass('active');
            });
        }
        var windowTop = $(window).scrollTop();
        setTimeout(function(){
            tourTop = parentCheck.offset().top;
            if(windowTop - tourTop > 50){
                $('html, body').animate({scrollTop:tourTop},0);
            }
        }, 300);
    });

	/* ---------------------------------------------------------------------- */
	/*	Add Cart
	/* ---------------------------------------------------------------------- */
	$(document).on('click', '.btn-add-cart', function(e){
		e.preventDefault();
		var id = $(this).attr('data-id');
		var num = '1';
		if ( $(this).hasClass('added') ){
			$(this).removeClass('added');
			$('.btn-add-cart[data-id='+id+']').text('Đang xử lý ...');
			$.post( '/cart/remove', { csrf_token_name:csrf_token_value, id:id , num:num }, function( data ) {
				var obj = jQuery.parseJSON(data);
				$(".cart-mini span").html(obj.sizecart);
				$('.btn-add-cart[data-id='+id+']').text('Thêm vào giỏ hàng');
			});
		}else{
			$(this).addClass('added');
			$('.btn-add-cart[data-id='+id+']').text('Đang xử lỹ..');
			$.post( '/cart/add', { csrf_token_name:csrf_token_value, id:id , num:num }, function( data ) {
				var obj = jQuery.parseJSON(data);
				$(".cart-mini span").html(obj.sizecart);
				$('.btn-add-cart[data-id='+id+']').text('Đã thêm vào giỏ hàng');
			});
		}
	});
	//
	// $('.btn-buy').click(function(e){
	// 	e.preventDefault();
	// 	console.log('vao');
	// 	var id = $(this).attr('data-id');
	// 	var num = '1';
	// 	$('.btn-buy[data-id='+id+']').text('Đang xử lý...');
	// 	$.post( '/products/gio-hang', { id:id , num:num }, function( data ) {
	// 		window.location.href = '/gio-hang';
	// 	});
	// });
	//
	// $('.cart-qty').change(function(){
	// 	var id = $(this).attr('data-id');
	// 	var num = $(this).val();
	// 	$('.cart_tong[data-id='+id+']').text('Đang xử lý ...');
	// 	$.post( '/cart/update', { csrf_token_name:csrf_token_value, id:id , num:num }, function( data ) {
	//
	// 		var obj = jQuery.parseJSON(data);
	// 		$(".cart-total span").html(obj.total);
	// 		$('.cart_tong[data-id='+id+']').html(obj.this_total);
	// 		var sizecart = obj.sizecart;
	// 		if(sizecart == '0'){
	// 			location.reload();
	// 		}
	// 	});
	// });

	// $('.btn-delete-cart').click(function(e){
	// 	e.preventDefault();
	// 	var id = $(this).attr('data-id');
	// 	$('.cart_tong[data-id='+id+']').text('Äang xá»­ lĂ½ ...');
	// 	$.post( '/cart/remove', { csrf_token_name:csrf_token_value, id:id }, function( data ) {
	//
	// 		var obj = jQuery.parseJSON(data);
	// 		$(".cart-total span").html(obj.total);
	// 		$('.cart_line[data-id='+id+']').remove();
	// 		$(".cart-mini span").html(obj.sizecart);
	// 		var sizecart = obj.sizecart;
	// 		if(sizecart == '0'){
	// 			location.reload();
	// 		}
	// 	});
	// });

	/* ---------------------------------------------------------------------- */
	/*	Seach Suggets
	/* ---------------------------------------------------------------------- */
	// $('.txt-search').keyup(function(){
	// 	var name = $(this).val();
	// 	$.post( '/search/suggest',{csrf_token_name:csrf_token_value, name:name},function( data ) {
	// 		$('.suggest-box').html(data);
	// 		$('.suggest-box').slideDown();
	// 	});	
	// });

	// $(document).mouseup(function (e)
	// {
	//     var container = $(".search-box");
	//     if (!container.is(e.target)
	//         && container.has(e.target).length === 0)
	//     {
	//         $('.suggest-box').hide();
	//     }
	// });

	/* menu image */
	$(".danh-muc-menu li a").on('click', function(e){
		var href = $(this).attr('href');
		if(href == '#'){
			e.preventDefault();
		}
	});
	var danh_muc_menu_height = $('.danh-muc-menu').outerHeight();
	$('.danh-muc-menu > ul > li > ul.sub-menu').css({
		'min-height' : danh_muc_menu_height + 'px'
	});
	
	$('.menu-disable > a').on('click', function(){
    	return false;
    });


});