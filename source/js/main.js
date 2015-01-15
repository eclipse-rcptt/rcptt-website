$(".ann").each(function() {
    var annBorder = $(this).find(".ann-border");
    var annOverlay = $(this).find(".ann-overlay");

    var countdown;
    
    annBorder.hover(
	function() {
	    clearTimeout(countdown);
	    annOverlay.show();
	},
	function() {
	    countdown = setTimeout(function() {
		annOverlay.hide();
	    }, 10);
	}
    );

    annOverlay.hover(
	function() {
	    clearTimeout(countdown);
	},
	function() {
	    annOverlay.hide();
	}
    );
});
