$(function(){ 
	$('.waterfall').masonry({
		itemSelector: '.waterfall-item',
		columnWidth: 240,
		isFitWidth: true
	});
});


$(function(){ 
	var $container = $('.waterfall'); 
	$container.imagesLoaded(function(){ 
		$container.masonry({ 
			itemSelector : '.waterfall-item', 
			columnWidth : 240,
			isFitWidth: true
		}); 
	}); 
}); 
