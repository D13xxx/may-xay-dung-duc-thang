$(document).ready(function(){

	$(".step_borrow li").each(function(index){
		$(this).click(function(){
			$(".step_borrow li").each(function(){
				$(this).removeClass("active");
			});
			$(this).addClass("active");
			$(".table_v").each(function(indexs){
				$(this).removeClass("active");
				if(indexs==index){
					$(this).addClass("active");
				}
			});

		});
	});
	// click tab news
	$(".list_news_page .right li").each(function(index){
		$(this).find('a').click(function(){
			$(".list_news_page .right li").each(function(){
				$(this).removeClass("active")
			});
			$(this).parent().addClass("active");
			$(".list_tab_content .tab_item ").each(function(){
				$(this).removeClass("active")
			});
			$(".list_tab_content .tab_item ").each(function(indexs){
				if(index==indexs){
					$(this).addClass("active");
				}
			});
			return false;
		});
	});
	$(".technology_inhome .right li").each(function(index){
		$(this).find("a").click(function(){
			$(".technology_inhome .right li").each(function(){
				$(this).removeClass('active');
			});
			$(this).parent().addClass('active');
			$(".list_tab_content .tab_l").each(function(){
				$(this).removeClass('active');
			});
			$(".list_tab_content .tab_l").each(function(indexs){
				if(indexs==index){
					$(this).addClass('active');
				}
			});
			return false;
		});
	});
	$(".accessories .right li").each(function(index){
		$(this).find("a").click(function(){
			$(".accessories .right li").each(function(){
				$(this).removeClass('active');
			});
			$(this).parent().addClass('active');
			$(".accessories .list_content ").each(function(){
				$(this).removeClass('active');
			});
			$(".accessories .list_content ").each(function(indexs){
				if(indexs==index){
					$(this).addClass('active');
				}
			});
			return false;
		});
	});
	$(".functions .right li").each(function(index){
		$(this).find("a").click(function(){
			$(".functions .right li").each(function(){
				$(this).removeClass('active');
			});
			$(this).parent().addClass('active');
			$(".functions .list_content ").each(function(){
				$(this).removeClass('active');
			});
			$(".functions .list_content ").each(function(indexs){
				if(indexs==index){
					$(this).addClass('active');
				}
			});
			return false;
		});
	});
	$(".specifications .right li").each(function(index){
		$(this).find("a").click(function(){
			$(".specifications  .right li").each(function(){
				$(this).removeClass('active');
			});
			$(this).parent().addClass('active');
			$(".specifications .list_content ").each(function(){
				$(this).removeClass('active');
			});
			$(".specifications .list_content ").each(function(indexs){
				if(indexs==index){
					$(this).addClass('active');
				}
			});
			return false;
		});
	});

	$(".content_news .list").each(function(indexs){
		if(indexs==1){
			$(this).css("display","block");
		}
	});

	$(".news .title li").each(function(index){
		$(this).click(function(){
			$(".news .title li").each(function(){
				if($(this).hasClass('active')){
					$(this).removeClass("active");
				}
			});
			$(this).addClass("active");
			$(".content_news .list").each(function(indexs){							
				$(this).css("display","none");
			});
			$(".content_news .list").each(function(indexs){
				if(index==indexs){
					$(this).css("display","block");
				}
			});
			return false;

		});
	});
	$(".menu_right ul li").each(function(){
		$(this).mousemove(function(){
			$(this).addClass("hover");
		});
		$(this).mouseleave(function(){
			$(this).removeClass("hover");
		});


	});

	$(".menu_left ul li").each(function(index){
		$(this).hover(function(){
			$(".menu_left ul li").each(function(){
				if($(this).hasClass('active')){
					$(this).removeClass('active');

				}
			});
			$(this).addClass("active");
			$(".text_content .name").each(function(){
				if($(this).hasClass('show')){
					$(this).removeClass('show');

				}
			});
			$(".text_content .name").each(function(indexs){
				if(index==indexs){
					$(this).addClass('show');
				}
			});
		});
	});
	setTimeout(function(){ 
		$(".load_home").remove();
	}, 1000);
	$(".content_news .list").each(function(indexs){
		if(indexs==1){
			$(this).css("display","block");
		}
	});

	$(".news .title li a").each(function(index){
		$(this).click(function(){
			$(".news .title li a").each(function(){
				if($(this).hasClass('active')){
					$(this).removeClass("active");
				}
			});
			$(this).addClass("active");
			$(".content_news .list").each(function(indexs){							
				$(this).css("display","none");
			});
			$(".content_news .list").each(function(indexs){
				if(index==indexs){
					$(this).css("display","block");
				}
			});
			return false;

		});
	});
	$(".menu_right ul li").each(function(){
		$(this).mousemove(function(){
			$(this).addClass("hover");
		});
		$(this).mouseleave(function(){
			$(this).removeClass("hover");
		});


	});

	$(".menu_left ul li").each(function(index){
		$(this).hover(function(){
			$(".menu_left ul li").each(function(){
				if($(this).hasClass('active')){
					$(this).removeClass('active');

				}
			});
			$(this).addClass("active");
			$(".text_content .name").each(function(){
				if($(this).hasClass('show')){
					$(this).removeClass('show');

				}
			});
			$(".text_content .name").each(function(indexs){
				if(index==indexs){
					$(this).addClass('show');
				}
			});
		});
	});
	$(".list_mau ul li").each(function(index){
		$(this).click(function(){
			$(".list_mau ul li").each(function(){
				if($(this).hasClass("active")){
					$(this).removeClass('active');
				}
			});
			$(this).addClass("active");
			$(".list_mau h4").text($(this).attr("data_name"));
			$(".img_overview img").each(function(){
				if($(this).hasClass('active')){
					$(this).removeClass('active');

				}
			});
			$(".img_overview img").each(function(indexs){
				if(index==indexs){
					$(this).addClass('active');

				}
			});
		});
	});
});
