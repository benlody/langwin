$(document).ready(function(){
	
	//flex
	$('.flexslider').flexslider({
		animation: "fade",
		slideshow:true,
		slideshowSpeed:5200,
		animationSpeed:800,
		controlNav:false,
		start: function(slider){
		  $('body').removeClass('loading');
		}
	});
	//flex


	//slick
	$(".regular").slick({
		dots: false,
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 2,
		autoplay:true,
		//arrows: false,
		autoplaySpeed:2000,
		speed:500,
		respondTo : 'window',
		mobileFirst:true,
		pauseOnFocus: false, 
		responsive:[
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 6,
					slidesToScroll: 6,
					autoplaySpeed:3000,
					speed:800
				}
			},

			{
				breakpoint: 768,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4,
					autoplaySpeed:2500
				}
			}
		]
	});
	//slick

});