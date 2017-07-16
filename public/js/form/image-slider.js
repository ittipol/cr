(function ($, window, document, undefined) {

	$('#image_slider').cubeportfolio({
	  layoutMode: 'slider',
	  drag: true,
	  gridAdjustment: 'responsive',
	  mediaQueries: [
	    {'width':1000,"cols":4},
	    {'width':800,"cols":3},
	    {'width':480,"cols":1},
	  ],
	  caption: 'zoom',
	  displayType: 'sequentially',
	  displayTypeSpeed: 100,
	  rewindNav: false,
	  showNavigation: false
	});

})(jQuery, window, document);