jQuery(document).ready(function ($) {
    jQuery('#menu-main-menu').each(function () {
	new SubMenu(jQuery(this));
    });

    // Mobile nav

    jQuery('header .mobile-nav-icon').click(function (e) {
	e.preventDefault();
	jQuery('header ul').slideToggle();
    });
    
    jQuery('#menu-main-menu .sub-menu').each(function (i, el) {
	jQuery(el).prev('a').before('<span class="menu-item__submenu-icon"></span>');
    });
});

var SubMenu = function (obj) {

    //private properties
    var _obj = obj,
	    _items = _obj.find('.menu-item'),
	    _arrow = _obj.find('.menu-item__submenu-icon');

    //private methods

    var _addEvents = function () {

	jQuery('body').on('mouseenter', '.menu-item__submenu-icon', function () {

	    if (jQuery(window).width() >= 978) {

		var curItem = jQuery(this),
			parent = curItem.parent('li');

		if (parent.hasClass('opened')) {

		    parent.removeClass('opened');

		} else {

		    parent.addClass('opened');

		}

	    }

	});

	jQuery('body').on('click', '.menu-item__submenu-icon', function () {

	    if (jQuery(window).width() < 978) {

		var curItem = jQuery(this),
			parent = curItem.parent('li');

		if (parent.hasClass('opened')) {

		    parent.removeClass('opened');

		} else {

		    parent.addClass('opened');

		}

	    }

	    return false;

	});
	_items.on({
	    mouseenter: function () {

		if (jQuery(window).width() >= 978) {

		    var curItem = jQuery(this),
			    parent = curItem.parent('ul');

		    if (parent.hasClass('sub-menu')) {

			var subMenu = curItem.find('ul');

			if ((jQuery(window).width() - (curItem.width() + curItem.offset().left)) < 180) {

			    subMenu.css({
				left: -(subMenu.innerWidth() + 10),
				top: 0
			    });

			} else {

			    subMenu.css({
				left: curItem.innerWidth() + 10,
				top: 0
			    });

			}


		    }

		}

	    }
	});

	_obj.on('mouseleave', function () {

	    if (jQuery(window).width() >= 978) {

		jQuery(this).find('.opened').removeClass('opened');

	    }

	});

	_obj.find('ul').on('mouseleave', function () {

	    if (jQuery(window).width() >= 978) {

		jQuery(this).find('.opened').removeClass('opened');

	    }

	});

    },
	    _init = function () {
		_addEvents();
	    };

    //public properties

    //public methods

    _init();
};