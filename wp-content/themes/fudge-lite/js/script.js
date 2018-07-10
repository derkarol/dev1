
// ************** Lightboxes ******************** //

// Session

jQuery(document).on('click', '.btn-session', function (e) {
    e.preventDefault();

    // check speaker lightbox
    if (jQuery('.speaker-pop').is(':visible')) {
	setTimeout(function () {
	    jQuery('.speaker-pop .close').trigger('click');
	}, 1000);
    }

    var datePicker = jQuery('.date-picker').position();
    jQuery('.session-info').css({
	'height': (jQuery(document).height())
    }).fadeIn();
    jQuery('.session-info .lightbox').css({
	'top': jQuery(window).scrollTop() + 102
    });
    jQuery.ajax({
	type: "POST",
	dataType: "json",
	url: fudge_lite_script_vars.ajaxurl,
	data: {
	    'action': 'get_session',
	    'data-id': jQuery(this).attr('data-id')
	},
	success: function (data) {
	    var speakers = '';
	    var tracks = '';
	    var post_edit_link = '';
	    var end_time = '';

	    if (data.post_edit_link && data.post_edit_link.length > 0)
		post_edit_link = '<a href="' + data.post_edit_link + '" class="edit_link">' + fudge_lite_script_vars.editlink + '</a>';

	    if (data.speakers)
		jQuery.each(data.speakers, function (index, speaker) {
		    speakers += '<div class="session-speaker"> \
                                        ' + speaker.post_image + ' \
                                        <span data-id="' + speaker.post_id + '">' + speaker.post_title + '</span> \
                                    </div>';
		});
	    if (data.tracks)
		jQuery.each(data.tracks, function (index, track) {
		    tracks += '<a class="btn main-bkg-color tag" title="' + track.name + '" href="#" style="background-color:#' + track.color + '!important;">' + track.name + '</a>';
		});
	    if (data.end_time && data.end_time.length > 0)
		end_time = ' - ' + data.end_time;

	    jQuery(".session-info .lightbox").html(
		    '<a title="' + fudge_lite_script_vars.closewindow + '" class="close"></a> \
                <h1>' + data.post_title + '</h1> \
                ' + post_edit_link + ' \
                <p>' + data.post_content + '</p> \
                ' + tracks + '\
                <div class="session-details">\
                    <p><span>' + fudge_lite_script_vars.location + '</span>' + data.location + '<p>\
                    <p><span>' + fudge_lite_script_vars.date + '</span>' + data.date + '<p>\
                    <p><span>' + fudge_lite_script_vars.time + '</span>' + data.time + end_time + '<p>\
                </div>\
                ' + speakers
		    );
	}
    });
});

// Speaker

jQuery(document).on('click', '.fudge_lite_speakers .post, .session-info [data-id]', function (e) {
    e.preventDefault();
    var el = this;

    // check session lightbox
    if (jQuery('.session-info .lightbox').is(':visible')) {
	setTimeout(function () {
	    jQuery('.session-info .lightbox .close').trigger('click');
	}, 1000);
    }

    var speaker = jQuery('.fudge_lite_speakers').position();
    jQuery(this).closest('section').find('.speaker-pop').css({
	'height': (jQuery(document).height())
    }).fadeIn();
    jQuery(this).closest('section').find('.speaker-pop .lightbox').css({
	'top': jQuery(window).scrollTop() + 102
    });
    jQuery.ajax({
	type: "POST",
	dataType: "json",
	url: fudge_lite_script_vars.ajaxurl,
	data: {
	    'action': 'get_speaker',
	    'data-id': jQuery(this).attr('data-id')
	},
	success: function (data) {
	    var sessions = '';
	    var post_edit_link = '';

	    if (data.post_edit_link && data.post_edit_link.length > 0)
		post_edit_link = '<a href="' + data.post_edit_link + '" class="edit_link">' + fudge_lite_script_vars.editlink + '</a>';
	    if (data.sessions)
		jQuery.each(data.sessions, function (index, session) {
		    sessions += '<div class="session-speaker"> \
                                        <p class="date">' + session.date + '</p> \
                                        <p><span class="btn-session" data-id="' + session.post_id + '">' + session.post_title + '</span></p> \
                                    </div>';
		});
	    jQuery(el).closest('section').find(".speaker-pop .lightbox").html(
		    '<a title="' + fudge_lite_script_vars.closewindow + '" class="close"></a> \
                ' + data.post_image + ' \
                <div class="speaker-details"> \
                    <h1>' + data.post_title + '</h1> \
                    ' + post_edit_link + ' \
                    <p>' + data.post_content + '</p> \
                    <div class="details"> \
                        <p><span>' + fudge_lite_script_vars.company + '</span>' + data.company + '<p> \
                        <p><span>' + fudge_lite_script_vars.shortbio + '</span>' + data.short_bio + '<p> \
                        <p><span>' + fudge_lite_script_vars.website + '</span><a href="http://' + data.website_url + '">' + data.website_url + '</a><p> \
                        <p><span>' + fudge_lite_script_vars.twitter + '</span>' + data.twitter_username + '<p> \
                    </div> \
                </div> \
                <h2>' + fudge_lite_script_vars.sessions + '</h2> \
                ' + sessions
		    );
	}
    });
});

// Media

jQuery('.fudge_lite_media .filter [data-id]').click(function (e) {
    jQuery('.fudge_lite_media .filter a:first').html(jQuery(this).html());
    jQuery('.fudge_lite_media .filter a:first').attr('data-id', jQuery(this).attr('data-id'));
});

jQuery('.fudge_lite_media .media-category .btn, .fudge_lite_media .filter a:not([data-ignore-click])').click(function (e) {
    jQuery('.fudge_lite_media .media-category .btn').removeClass('active');
    jQuery(this).addClass('active');
    jQuery('#all-media').empty();

    /*jQuery('#all-media').fadeOut(1000, function(){
     });*/
});

jQuery(document).on('click', '.fudge_lite_media .btn-less', function (e) {
    e.preventDefault();
    var curPage = jQuery('#cur_media_page').val();
    var fromIndex = (curPage - 1) * fudge_lite_script_vars.media_limit;
    jQuery('.fudge_lite_media #all-media a.post:gt(' + (fromIndex - 1) + ')').remove();
    jQuery('#cur_media_page').val(curPage - 1);
    if (curPage > 1)
	jQuery('.fudge_lite_media .btn-more').show();
    if (curPage - 1 < 2)
	jQuery(this).hide();

    var last = jQuery('#all-media a.post').last();
    if (last && last.offset())
	window.scroll(last.offset().left, last.offset().top - 102);
});

jQuery('.fudge_lite_media .media-category .btn, .fudge_lite_media .filter a[data-id]:not([data-ignore-click]), .fudge_lite_media .btn-more').click(function (e) {
    e.preventDefault();
    var req_page = 1;
    var data_id = 0;
    var data_limit = fudge_lite_script_vars.media_limit;

    if (jQuery(this).hasClass('btn-more'))
	req_page = parseInt(jQuery('#cur_media_page').val()) + 1;
    if (jQuery(window).width() <= fudge_lite_script_vars.mobile_width)
	data_id = jQuery('.fudge_lite_media .filter a:first').attr('data-id');
    else
	data_id = jQuery('.fudge_lite_media .media-category .active').attr('data-id');

    if (jQuery(window).width() <= fudge_lite_script_vars.mobile_width)
	data_limit = 3;

    jQuery.ajax({
	type: "POST",
	dataType: "json",
	url: fudge_lite_script_vars.ajaxurl,
	data: {
	    'action': 'get_media',
	    'data-id': data_id,
	    'data-page': req_page,
	    'data-limit': data_limit
	},
	success: function (data) {
	    var medias = '';
	    if (data.media)
		jQuery.each(data.media, function (index, media) {
		    var img = media.post_image;
		    var detail = '<span class="view"></span>';
		    var zoomHref = '';
		    var classVideo = '';

		    if (media.post_video != '') {
			img = media.post_video;
			detail = '';
			zoomHref = '';
			classVideo = ' video';
		    } else
			zoomHref = ' href="' + media.post_image_big_url + '"';

		    medias += '<a class="post' + classVideo + '"' + zoomHref + '> \
                                    ' + img + ' \
                                    ' + detail + ' \
                                    <h3>' + media.post_title + '</h3> \
                                    ' + media.post_content + ' \
                                </a>';
		});
	    jQuery('#all-media').append(medias);
	    jQuery('#cur_media_page').val(data.page);
	    if (data.page > 1)
		jQuery('.fudge_lite_media .btn-less').show();
	    else
		jQuery('.fudge_lite_media .btn-less').hide();
	    if (data.more == 1)
		jQuery('.fudge_lite_media .btn-more').show();
	    else
		jQuery('.fudge_lite_media .btn-more').hide();

	    //jQuery('#all-media').fadeIn();
	}
    });
});



// Schedule

jQuery('.fudge_lite_schedule .date-picker-mobile [data-timestamp]').click(function () {
    jQuery('.fudge_lite_schedule .date-picker-mobile a:first').html(jQuery(this).html());
    jQuery('.fudge_lite_schedule .date-picker-mobile a:first').attr('data-timestamp', jQuery(this).attr('data-timestamp'));
});

jQuery('.fudge_lite_schedule .date-picker a').click(function (e) {
    jQuery('.fudge_lite_schedule .date-picker a').removeClass('active');
    jQuery('.filters .track a, .filters .location a').removeClass('active');
    jQuery(this).addClass('active');
});

jQuery('.filters .track a, .filters .location a, .date-picker a, .date-picker-mobile a:not([data-ignore-click])').click(function (e) {
    jQuery('.filters .track a, .filters .location a').removeClass('active');
    jQuery(this).addClass('active');
});

jQuery('.fudge_lite_schedule .btn-less').click(function (e) {
    e.preventDefault();
    var curPage = jQuery('#cur_page').val();
    var fromIndex = (curPage - 1) * fudge_lite_script_vars.schedule_limit;
    jQuery('.fudge_lite_schedule .session:gt(' + (fromIndex - 1) + ')').remove();
    jQuery('#cur_page').val(curPage - 1);
    if (curPage > 1)
	jQuery('.fudge_lite_schedule .btn-more').show();
    if (curPage - 1 < 2)
	jQuery(this).hide();
    var last = jQuery('.fudge_lite_schedule .session').last();
    if (last && last.offset())
	window.scroll(last.offset().left, last.offset().top - 102);
});

jQuery('.fudge_lite_schedule .filter ul a[data-track], .fudge_lite_schedule a[data-timestamp]:not([data-ignore-click]), .fudge_lite_schedule .filter ul a[data-location],  .fudge_lite_schedule .btn-more').click(function (e) {
    e.preventDefault();

    var req_page = 1;
    var data_timestamp = 0;

    if (jQuery(this).hasClass('btn-more'))
	req_page = parseInt(jQuery('#cur_page').val()) + 1;

    if (jQuery(window).width() <= fudge_lite_script_vars.mobile_width)
	data_timestamp = jQuery('.fudge_lite_schedule .date-picker-mobile a:first').attr('data-timestamp');
    else
	data_timestamp = jQuery('.fudge_lite_schedule .date-picker a.active').attr('data-timestamp');

    if (!jQuery(this).hasClass('btn-more') && !jQuery(this).hasClass('btn-less')) {

	jQuery('.fudge_lite_schedule-sessions .session').remove();
    }

    if (device.mobile() || device.tablet()) {
	fudgeLiteCheckFilterDrop();
    }

    jQuery.ajax({
	type: "POST",
	dataType: "json",
	url: fudge_lite_script_vars.ajaxurl,
	data: {
	    'action': 'get_schedule',
	    'data-timestamp': data_timestamp,
	    'data-location': jQuery('.fudge_lite_schedule .location a.active').attr('data-location'),
	    'data-track': jQuery('.fudge_lite_schedule .track a.active').attr('data-track'),
	    'data-page': req_page
	},
	success: function (data) {

	    if (data.sessions) {
		var last_time = jQuery('.session:last .time').html();

		jQuery.each(data.sessions, function (index, session) {
		    var concurrent = '';
		    var time = session.time;
		    var speakers = '';

		    if (last_time == session.time) {
			concurrent = 'concurrent';
			time = '';
		    }
		    last_time = session.time;

		    if (session.speakers)
			jQuery.each(session.speakers, function (index, speaker) {
			    speakers += '<li>' + speaker.post_image + '</li>';
			});

		    var html = '<div class="session ' + concurrent + '"> \
                                        <div class="location">' + session.location + '</div> \
                                        <div class="time ' + concurrent + '">' + time + '</div> \
                                        <div class="info"> \
                                            <a class="btn-session main-bkg-color" title="' + session.post_title + '" href="#" data-id="' + session.id + '" style="background-color: #' + session.background_color + '!important;">' + session.post_title + '</a> \
                                            <ul> \
                                                ' + speakers + ' \
                                            </ul> \
                                        </div> \
                                    </div>';
		    if (jQuery('.fudge_lite_schedule .session').size() > 0)
			jQuery(html).insertAfter('.fudge_lite_schedule .session:last');
		    else
			jQuery(html).insertBefore('#cur_page');
		});

		jQuery('#cur_page').val(data.page);
		if (data.page > 1)
		    jQuery('.fudge_lite_schedule .btn-less').show();
		else
		    jQuery('.fudge_lite_schedule .btn-less').hide();
		if (data.more == 1)
		    jQuery('.fudge_lite_schedule .btn-more').show();
		else
		    jQuery('.fudge_lite_schedule .btn-more').hide();
	    }
	    if (jQuery(window).width() <= fudge_lite_script_vars.mobile_width)
		jQuery('.filter.date-picker-mobile ul, .filter.track ul, .filter.location ul').hide();
	}
    });
});

function fudgeLiteCheckFilterDrop() {

    var filterDropdown = jQuery('.filter ul');

    if (filterDropdown.is(':visible')) {

	filterDropdown.css({
	    'display': 'none'
	})

    }

}

// Speakers

jQuery(document).on('click', '.fudge_lite_speakers .btn-less', function (e) {
    e.preventDefault();
    var curPage = jQuery('#cur_speakers_page').val();
    var fromIndex = (curPage - 1) * fudge_lite_script_vars.speakers_limit;
    jQuery('#all-speakers a.post:gt(' + (fromIndex - 1) + ')').remove();
    jQuery('#cur_speakers_page').val(curPage - 1);
    if (curPage > 1)
	jQuery('.fudge_lite_speakers .btn-more').show();
    if (curPage - 1 < 2)
	jQuery(this).hide();

    var last = jQuery('.fudge_lite_speakers a.post').last();
    if (last && last.offset())
	window.scroll(last.offset().left, last.offset().top - 102);
});

jQuery('.fudge_lite_speakers .btn-more').click(function (e) {
    e.preventDefault();
    var req_page = parseInt(jQuery('#cur_speakers_page').val()) + 1;
    var data_limit = fudge_lite_script_vars.speakers_limit;

    if (jQuery(window).width() <= fudge_lite_script_vars.mobile_width)
	data_limit = 3;

    jQuery.ajax({
	type: "POST",
	dataType: "json",
	url: fudge_lite_script_vars.ajaxurl,
	data: {
	    'action': 'get_speakers',
	    'data-page': req_page,
	    'data-limit': data_limit
	},
	success: function (data) {
	    var speakers = '';
	    if (data.speakers)
		jQuery.each(data.speakers, function (index, speaker) {
		    speakers += '<a class="post" href="#" data-id="' + speaker.post_ID + '"> \
                                            ' + speaker.post_image + ' \
                                            <h3>' + speaker.post_title + '</h3> \
                                            <p> \
                                                ' + speaker.post_company + ' \
                                                <br/> \
                                                ' + speaker.post_short_bio + ' \
                                            </p> \
                                        </a>';
		});
	    jQuery('#all-speakers').append(speakers);
	    jQuery('#cur_speakers_page').val(data.page);
	    if (data.page > 1)
		jQuery('.fudge_lite_speakers .btn-less').show();
	    else
		jQuery('.fudge_lite_speakers .btn-less').hide();
	    if (data.more == 1)
		jQuery('.fudge_lite_speakers .btn-more').show();
	    else
		jQuery('.fudge_lite_speakers .btn-more').hide();
	}
    });
});

jQuery('#media-grid').on('click', 'a.post', function (e) {
    e.preventDefault();

    if (!jQuery(this).hasClass('video')) {
	if (jQuery(window).width() <= fudge_lite_script_vars.mobile_width)
	    return;

	var view = jQuery('.fudge_lite_media').position();
	var image = jQuery(this).attr("href");
	var lb = jQuery('<div />').addClass('lightbox-container media-lightbox').appendTo('body');
	var _lb = jQuery('<div />').addClass('lightbox').appendTo(lb);
	var _close = jQuery('<a />', {
	    title: 'Close'
	}).addClass('close').appendTo(_lb);
	jQuery('<img />', {
	    src: image,
	    alt: ''
	}).appendTo(_lb);

	lb.css({
	    'height': (jQuery(document).height())
	}).fadeIn();
	_lb.css({
	    'top': jQuery(window).scrollTop() + 102
	});

	_close.on('click', function (e) {
	    e.preventDefault();
	    jQuery(this).parents('.lightbox-container').fadeOut().remove();
	});
    }
});

jQuery(document).on('click', '.lightbox .tag', function (e) {
    e.preventDefault();
});

// Close it

jQuery('.lightbox').on('click', '.close', function (e) {
    e.preventDefault();
    jQuery(this).parents('.lightbox-container').fadeOut();
});

jQuery(document).on('click', '.lightbox-container', function (e) {
    if (e.target == this) {
	e.preventDefault();
	jQuery(this).fadeOut();
    }
});

// ************** DOC READY FUNCTIONS ******************** //

jQuery(document).ready(function () {

    // Filter Drops

    if (jQuery(window).width() < 1024) {
	jQuery('.filter').click(function () {
	    jQuery(this).find('ul').toggle();
	});
    }

    // Contact Form AJAX

    jQuery('form#contact-us').submit(function () {

	var hasError = false;
	jQuery('form#contact-us .error').remove();

	jQuery('.requiredField').each(function () {
	    if (jQuery.trim(jQuery(this).val()) == '') {
		jQuery(this).parent().append('<span class="error">' + fudge_lite_script_vars.contact_fieldmissing + '</span>');
		jQuery(this).addClass('inputError');
		hasError = true;
	    } else if (jQuery(this).hasClass('email')) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if (!emailReg.test(jQuery.trim(jQuery(this).val()))) {
		    jQuery(this).parent().append('<span class="error">' + fudge_lite_script_vars.contact_invalidemail + '</span>');
		    jQuery(this).addClass('inputError');
		    hasError = true;
		}
	    }
	});

	if (!hasError) {
	    jQuery('.fudge_lite_contact .alert, .fudge_lite_contact .info').remove();
	    jQuery.ajax({
		url: fudge_lite_script_vars.ajaxurl,
		data: jQuery(this).serialize(),
		dataType: 'json',
		type: 'POST',
		success: function (data) {
		    if (data.sent == true)
			jQuery('form#contact-us').slideUp("fast", function () {
			    jQuery('#contact-form').before('<p class="info">' + data.message + '</p>');
			});
		    else
			jQuery('#contact-form').before('<p class="alert">' + data.message + '</p>');
		},
		error: function (data) {
		    jQuery('#contact-form').before('<p class="alert">' + data.message + '</p>');
		}
	    });
	}

	return false;
    });

    jQuery('.fudge_lite_explore a[data-lat]').click(function (e) {
	e.preventDefault();
	jQuery('.fudge_lite_explore .container').gmap('get', 'map').setOptions({'center': new google.maps.LatLng(jQuery(this).attr('data-lat'), jQuery(this).attr('data-lng'))});
    });

    if (jQuery(window).width() <= fudge_lite_script_vars.mobile_width) {
	jQuery('.fudge_lite_schedule .date-picker-mobile ul li a:first').trigger('click');
	jQuery('.fudge_lite_media .filter ul li a:first').trigger('click');
    }
    else {
	jQuery('.fudge_lite_schedule .date-picker a:first').trigger('click');
	jQuery('.fudge_lite_media .media-category a:first').trigger('click');
    }
    jQuery('.fudge_lite_speakers .btn-more').trigger('click');
});
