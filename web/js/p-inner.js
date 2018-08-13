$('.open-popup-link').magnificPopup({
  type:'inline',
  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
});

$('.image-link').magnificPopup({type:'image'});

$('.popup-gallery').magnificPopup({
	delegate: 'a',
	type: 'image',
	mainClass: 'mfp-img-mobile',
	gallery: {
		enabled: true,
		navigateByImgClick: true,
		preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	},
	image: {
		tError: '<a href="%url%">圖片 #%curr%</a> 讀取失敗。'
	}
});

$('.m-close').on( "click", function() {
  $.magnificPopup.close();
});




$(document).ready(function(){
	
	$(window).scroll(function() {
		
		if(!$(".sticky-over").offset()){
			return;
		}
		var Pinner = $(window).scrollTop();
		var StickyTop = $(".sticky-over").offset().top;
		var StickyBottom = StickyTop + $(".sticky-over").outerHeight() - $('header').height();
		var StickyHeight = $(".sticky").height();
		
		
		if ($(window).width() >= 768) {
			if (Pinner >= StickyBottom) {
				$(".sticky").addClass("fixed");
				$(".sticky-over").css({marginTop:StickyHeight});
			}
			else{
				$(".sticky").removeClass("fixed");
				$(".sticky-over").css({marginTop:0});
			}
		}
		
	}).scroll();
	
});



