/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

$(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	/*
	*
	*	Mobile Burger Menu
	*
	------------------------------------*/
	$('.burger, .overlay').click(function(){
	  $('.burger').toggleClass('clicked');
	  $('.overlay').toggleClass('show');
	  $('nav').toggleClass('show');
	  $('body').toggleClass('overflow');
	});
	$('nav.mobilemenu li').click(function() {
	    $(this).find('ul.dropdown').toggleClass('active');
	});

	/*
        FAQ dropdowns
	__________________________________________
	*/
	$('.question').click(function() {
	 
	    $(this).next('.answer').slideToggle(500);
	    $(this).toggleClass('close');
	    $(this).find('.plus-minus-toggle').toggleClass('collapsed');
	    $(this).parent().toggleClass('active');
	 
	});
	/*
        Deferral Steps
	__________________________________________
	*/
	$('.step-title').click(function() {
	 
	    $(this).next('.step-desc').slideToggle(500);
	    $(this).toggleClass('close');
	    $(this).find('.plus').toggleClass('active');
	    $(this).parent().toggleClass('active');
	 
	});

	/*
	*
	*	Responsive iFrames
	*
	------------------------------------*/
	var $all_oembed_videos = $("iframe[src*='youtube']");
	
	$all_oembed_videos.each(function() {
	
		$(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
 	
 	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
//	var $container = $('#container').imagesLoaded( function() {
//  	$container.isotope({
//    // options
//	 itemSelector: '.item',
//		  masonry: {
//			gutter: 15
//			}
// 		 });
//	});
	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	//new WOW().init();
    
    
    /* timeline */
    $('.timeline-info').each(function(){
        if($(this).hasClass('highlight')) {
            $(this).prev().addClass('before');
        }
    });
    
    $('body').on("click","#formSubmitBtn",function(){
        $('.gform_button').trigger("click");
    });
    
    
    /* Our People */
    auto_resize_no_photo();
    function auto_resize_no_photo() {
        if( $('.staff-photo').length > 0 ) {
            var hNums = [];
            $('.staff-photo').each(function(){
                var imgHeight = $(this).height();
                var heightVal = imgHeight + 'px';
                hNums.push(imgHeight);
            });

            if(hNums.length>0) {
                var arrs = jQuery.unique( hNums );
                arrs.sort(function(a, b){
                  return parseInt(b)- parseInt(a);
                });
                var maxH = arrs[0] + 'px';
                $('.people .no-image').each(function(){
                   $(this).css('height',maxH); 
                });
            }
        }
    }

    $('.box,.clickable-box').each(function(){
    	var box = $(this);
    	if( box.find('.learnmore a').length>0 ) {
    		box.addClass('has-link');
    	}
    });
    
    $(document).on("click",".boxes .box",function(){
    	if( $(this).find(".learnmore a").length > 0 ) {
    		var pagelink = $(this).find(".learnmore a").attr("href");
    		window.location.href = pagelink;
    	}
    });

    $(".clickable-box").on("click",function(){
    	if( $(this).find(".learnmore a").length > 0 ) {
    		var pagelink = $(this).find(".learnmore a").attr('href');
    		window.location.href = pagelink;
    	}
    });


	$(window).scroll(function(){
        if ( $(this).scrollTop() > 100 ) {
            $('body').addClass('scrolled');    
        } else {
            $('body').removeClass('scrolled');    
        }
    }); 

	$("#primary-menu a").each(function(){
		var href = $(this).attr('href');
		var parent = $(this).parents('li');
		if(href=='#') {
			$(this).addClass('hashlink');
			$(this).attr('title','Select from dropdown');
		}
	});

	$(document).on("click",".hashlink",function(e){
		e.preventDefault();
		var parent = $(this).parents('li');
		var msg = '<span class="select-msg">Select from dropdown<i></i></span>';
		//parent.prepend(msg);
		parent.find('ul.sub-menu').addClass('animated shake');
		setTimeout(function(){
			parent.find('ul.sub-menu').removeClass('animated shake');
		},400);
	});


});// END #####################################    END