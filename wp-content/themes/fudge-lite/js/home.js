jQuery(document).ready(function ($) {

    // Twitter

    !function (d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
	if (!d.getElementById(id)) {
	    js = d.createElement(s);
	    js.id = id;
	    js.src = p + '://platform.twitter.com/widgets.js';
	    fjs.parentNode.insertBefore(js, fjs);
	}
    }(document, 'script', 'twitter-wjs');

    // Smooth Scrolling

    var locationPath = fudgeLiteFilterPath(location.pathname);
    var scrollElem = fudgeLiteScrollableElement('html', 'body', 'document', 'window');

    jQuery('a[href*="#"]').each(function () {
	var thisPath = fudgeLiteFilterPath(this.pathname) || locationPath;
	if (locationPath == thisPath
		&& (location.hostname == this.hostname || !this.hostname)
		&& this.hash.replace(/#/, '')) {
	    var $target = jQuery(this.hash), target = this.hash;
	    if (target) {
		jQuery(this).click(function (event) {
		    if ($target.offset() && $target.offset().top) {
			var targetOffset = $target.offset().top - 102;
			event.preventDefault();
			jQuery(scrollElem).animate({
			    scrollTop: targetOffset
			}, 1800, function () {
			});
		    }
		});
	    }
	}
    });

    jQuery('input, textarea').placeholder();
    jQuery('.pbs').remove();

    // Sticky Nav
    $(window).scroll(function () {
	var header = $(document).scrollTop();
	if (header > 568) {
	    $('header').addClass('sticky');
	} else {
	    $('header').removeClass('sticky');
	}
    });
});

function fudgeLiteFilterPath(string) {
    return string
	    .replace(/^\//, '')
	    .replace(/(index|default).[a-zA-Z]{3,4}$/, '')
	    .replace(/\/$/, '');
}

// use the first element that is "scrollable"
function fudgeLiteScrollableElement(els) {
    for (var i = 0, argLength = arguments.length; i < argLength; i++) {
	var el = arguments[i],
		$scrollElement = jQuery(el);
	if ($scrollElement.scrollTop() > 0) {
	    return el;
	} else {
	    $scrollElement.scrollTop(1);
	    var isScrollable = $scrollElement.scrollTop() > 0;
	    $scrollElement.scrollTop(0);
	    if (isScrollable) {
		return el;
	    }
	}
    }
    return 'body';
}