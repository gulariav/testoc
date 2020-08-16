function loadscroler(){
	$('body').prepend('<a href="#" class="bottom-top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>');
	var amountScrolled = 300;
	$(window).on('scroll',function() {
		if ( $(window).scrollTop() > amountScrolled ) {
			$('a.bottom-top').fadeIn('slow');
		} else {
			$('a.bottom-top').fadeOut('slow');
		}
	});
	$('a.bottom-top').on('click',function() {
		$('html, body').animate({
			scrollTop: 0
		}, 700);
		return false;
	});
    
    
}
$(document).on('ready',function(){ 
	"use strict";
	loadscroler();
	
	
	/*slideshow script code start here*/
	$('.slideshow').owlCarousel({
		items: 1,
		autoPlay: true,
		singleItem: true,
		navigation: true,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: true,
	});
	/*slideshow script code end here*/

	/*ourteam script code start here*/
	$('.ourteam').owlCarousel({
		items: 3,
		itemsDesktop : [1199, 3],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 1],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: false,
		afterAction: function(el){
		   this
		   .$owlItems
		   .removeClass('active')

		   this
		   .$owlItems 
		   .eq(this.currentItem)
		   .addClass('active')

		 }
	});
	$('.ourteam .owl-item img').on('click',function(){
		$(this).parent('.owl-item').addclass('active');
	});
	/*ourteam script code end here*/

	/*testimonial script code start here*/
	$('.testimonial').owlCarousel({
		items: 1,
		itemsDesktop : [1199, 1],
		itemsDesktopSmall : [979, 1],
		itemsTablet : [768, 1],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: true,
	});
	/*testimonial script code end here*/	
	
	
	/*clints logo script code start here*/
	$('.clients').owlCarousel({
		items: 5,
		itemsDesktop : [1199, 5],
		itemsDesktopSmall : [979, 4],
		itemsTablet : [768, 3],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: true,
	});
	/*clients logo script code end here*/

	/*gallery-single script code start here*/
	$('#gallery-single').owlCarousel({
		items: 1,
		itemsDesktop : [1199, 1],
		itemsDesktopSmall : [979, 1],
		itemsTablet : [768, 1],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: true,
	});
	/*gallery-single script code end here*/
	
	
	/*thoughts script code start here*/
	$('.thoughts').owlCarousel({
		items: 4,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 2],
		itemsTablet : [768, 2],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: true,
	});
	/*thoughts script code end here*/	
	
	/*featured-inner script code start here*/
	$('.featured-inner').owlCarousel({
		items: 1,
		itemsDesktop : [1199, 1],
		itemsDesktopSmall : [979, 1],
		itemsTablet : [768, 2],
		itemsMobile : [479, 1],
		navigation : true,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<img src="images/arrow.png"/>', '<img src="images/arrow-r.png"/>'],
		pagination: false,
	});
	/*featured-inner script code end here*/

	/*carousel10 script code start here*/
	$('.carousel10').owlCarousel({
		items: 6,
		itemsDesktop : [1199, 5],
		itemsDesktopSmall : [979, 4],
		itemsTablet : [768, 2],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: false,
	});
	/*carousel10 script code end here*/

	/*clients script code start here*/
	$('.clients').owlCarousel({
		items: 4,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 4],
		itemsTablet : [768, 2],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: false,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: true,
	});
	/*clients script code end here*/
    
    /*client-testimonial script code start here*/
	$('.client-testimonial').owlCarousel({
		items: 1,
		itemsDesktop : [1199, 1],
		itemsDesktopSmall : [979, 1],
		itemsTablet : [768, 1],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: false,
		slideSpeed : 300,
		paginationSpeed : 400,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: true,
	});
	/*client-testimonial script code end here*/

	/*processtest script code start here*/
	$('.processtest').owlCarousel({
		items: 3,
		itemsDesktop : [1199, 3],
		itemsDesktopSmall : [979, 2],
		itemsTablet : [768, 1],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: true,
	});
	/*processtest script code end here*/

	/*aboutteam script code start here*/
	$('.aboutteam').owlCarousel({
		items: 4,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 1],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: false,
	});
	/*aboutteam script code end here*/

	/*brands script code start here*/
	$('#brands').owlCarousel({
		items: 1,
		itemsDesktop : [1199, 1],
		itemsDesktopSmall : [979, 1],
		itemsTablet : [768, 1],
		itemsMobile : [479, 1],
		navigation : true,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: false,
	});
	/*brands script code end here*/

	/*portfolio-carousel script code start here*/
	$('.portfolio-carousel').owlCarousel({
		items: 4,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 2],
		itemsMobile : [479, 1],
		navigation : false,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<i class="fa fa-long-arrow-left fa1"></i>', '<i class="fa  fa-long-arrow-right fa2"></i>'],
		pagination: true,
	});
	/*portfolio-carousel script code end here*/

	/*portfolio-single script code start here*/
	$('#portfolio-single').owlCarousel({
		items: 1,
		itemsDesktop : [1199, 1],
		itemsDesktopSmall : [979, 1],
		itemsTablet : [768, 1],
		itemsMobile : [479, 1],
		navigation : true,
		autoPlay: 5000,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : false,
		navigationText: ['<img src="images/arrow.png"/>', '<img src="images/arrow-r.png"/>'],
		pagination: false,
		
	});
	
	/*portfolio-single script code end here*/

	// collapse
	$('.collapse').on('shown.bs.collapse', function(){
	$(this).parent().removeClass("active").addClass("active");
	$(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
	}).on('hidden.bs.collapse', function(){
	$(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
	$(this).parent().removeClass("active").addClass("");
	});
	
	/*sidenav code start here*/
    $('#mySidenav').hide();
    $('.opennav').on('click',function(){
        $('#mySidenav').show();
    });
    
    $('.closebtn').on('click',function(){
        $('#mySidenav').hide();
    });
	/*sidenav code end here*/

	/*overlay code start here*/
    $('#myNav').hide();
    $('.openoverlay').on('click',function(){
        $('#myNav').show();
    });
    
    $('.closebtn').on('click',function(){
        $('#myNav').hide();
    });
    
     $('.menubar').on('click',function(){
        $(this).toggleClass('active');
        $('#menu').toggleClass('active');
        $('#menu .collapse').toggleClass('in');
    });
	/*overlay code end here*/


	/*signin code start here*/
    $('#signin').hide();
    $('.opensign').on('click',function(){
        $('#signin').show();
    });
    
    $('.closebtn').on('click',function(){
        $('#signin').hide();
    });
	/*signin code end here*/

	/*signup code start here*/
    $('#signup').hide();
    $('.opensignup').on('click',function(){
        $('#signup').show();
    });
    
    $('.closebtn').on('click',function(){
        $('#signup').hide();
    });
	/*signup code end here*/


	/*progress bar code start here*/ 
    $('.progress .progress-bar').css("width",
        function() {
            return $(this).attr("aria-valuenow") + "%";
        }
    )
	/*progress bar code end here*/


	/* quantity code start here */
	$(function () {
		$('.add').on('click',function(){
			var $qty=$(this).closest('p').find('.qty');
			var currentVal = parseInt($qty.val());
				$qty.val(currentVal + 1);
		});
		$('.minus').on('click',function(){
			var $qty=$(this).closest('p').find('.qty');
			var currentVal = parseInt($qty.val());
			$qty.val(currentVal - 1);					
		});
	});	
	/* quantity code end here */
    
    // Product List
	$('#list-view').on('click',function(){
		$('.product-grid').attr('class', 'product-list col-xs-12');
		$('#grid-view').removeClass('active');
		$('#list-view').addClass('active');

		localStorage.setItem('display', 'list');
	});

	// Product Grid
	$('#grid-view').on('click',function(){
		$('.product-list').attr('class', 'product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12');

		$('#list-view').removeClass('active');
		$('#grid-view').addClass('active');

		localStorage.setItem('display', 'grid');
	});

	if (localStorage.getItem('display') == 'list') {
		$('#list-view').trigger('click');
		$('#list-view').addClass('active');
	} else {
		$('#grid-view').trigger('click');
		$('#grid-view').addClass('active');
	}
    
     $(".review-click").on('click',function(){
        $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 500);
    });
    
});	

	jQuery(function($){
		morkoParallax = function() {
			$('.scollmain').each(function() {
			var parallaxBlock = $(this);
			var parallaxLayer = $(this).find('.scroll_layers');

				$(window).on('load scroll', function() {
                    var radix = 0;
				var parallaxHeight = parseInt( parallaxBlock.outerHeight(),radix );
				var parallaxImgHeight = parseInt( parallaxLayer.outerHeight(),radix );

				var parallaxOffset1 = parseInt( parallaxBlock.offset().top,radix );
				var parallaxOffset2 = parseInt( parallaxOffset1 + parallaxHeight,radix);

				var translateMax = parseInt( parallaxImgHeight - parallaxHeight ) - 2; 
				var scrollTemp = $(window).scrollTop() + window.innerHeight;

				if ( ( scrollTemp >= parallaxOffset1 ) && ( $(window).scrollTop() <= parallaxOffset2 ) ) {
				var translateVal = parseInt( ( scrollTemp - parallaxOffset1 ) * 0.15 );

				if ( translateVal <= translateMax ) {
				parallaxLayer.css({ 'transform' : 'translate3d(0, -' + translateVal + 'px, 0)' });
				}
				else if ( translateVal > translateMax ) {
				parallaxLayer.css({ 'transform' : 'translate3d(0, -' + translateMax + 'px, 0)' });
				};

			};

		});

		});

		};
		morkoParallax();

		$(document).on('banner_bg:load banner_bg:unload', '.banners', function() {
		morkoParallax();
		});
	});

(function($){"use strict";function getDirection(ev,obj){var w=$(obj).width(),h=$(obj).height(),x=(ev.pageX-$(obj).offset().left-(w/2))*(w>h?(h/w):1),y=(ev.pageY-$(obj).offset().top-(h/2))*(h>w?(w/h):1),d=Math.round(Math.atan2(y,x)/1.57079633+5)%4;return d;}
function addClass(ev,obj,state){var direction=getDirection(ev,obj),class_suffix=null;$(obj).removeAttr('class');switch(direction){case 0:class_suffix='-top';break;case 1:class_suffix='-right';break;case 2:class_suffix='-bottom';break;case 3:class_suffix='-left';break;}
$(obj).addClass(state+class_suffix);}
$.fn.cmsDeriction=function(){this.each(function(){$(this).hover(function(ev){addClass(ev,this,'box in');},function(ev){addClass(ev,this,'box out');})})}
$('.cms-portfolio-effect').cmsDeriction();})(jQuery);					

