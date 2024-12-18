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

	annBorder.removeAttr('title');
});

if (true) {
	$(".ann-image").each(function() {
		let annDebug = $(this).find(".ann-debug");
		annDebug.show();
		$(this).find("img").on( "mousemove", (event) => {
			annDebug.text( "" + event.offsetX + ", " + event.offsetY);
		} );
	});
}

$(`.submenu-item a[href="${location.pathname}"]`).parents('.collapse').collapse('show');
