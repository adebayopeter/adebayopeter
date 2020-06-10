$(document).ready(function() {
	
	/* Full Screen Container ======================================= */

	function fullScreenContainer() {
		var screenWidth = $(window).width() + "px";
		var screenHeight = $(window).height() + "px";
		$("#hero").css({
			width: screenWidth,
			height: screenHeight
		});
		$(window).resize( function () {
			var screenWidth = $(window).width() + "px";
			var screenHeight = $(window).height() + "px";
			$("#hero").css({
				width: screenWidth,
				height: screenHeight
			}); 
		});
	}
	
	fullScreenContainer();

	/* wow ======================================= */

	new WOW().init({
		offset: 20 
	});

	/* Navbar colapse ======================================= */
	$(document).on('click.nav','.navbar-collapse.in',function(e) {
		if( $(e.target).is('a') || $(e.target).is('button')) {
			$(this).collapse('hide');
		}
	});


	/* show about more  ======================================= */
	$("#show-btn").click(function() {
		$('#showme').slideDown("slow");
		$(this).hide();
		return false;
	});

	/* testimonial ======================================= */
	$('.carousel').carousel();
	
	/* One Page Navigation Setup ======================================= */
	$('#main-nav').singlePageNav({
		offset: 60,
		speed: 750,
		currentClass: 'active',
		beforeStart: function() {},
		onComplete: function() {}
	});
	
	/* Bootstrap Affix ======================================= */		
	$('#modal-bar').affix({
		offset: {
			top: 10,
		}
	});


	/* countdown ======================================= */	
	var days = 3;
	var date = new Date();
	var res = date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
	
	$('#countdown').countdown(res, function(event) {
	  $(this).text(
		event.strftime('%-d days %H:%M:%S')
	  );
	});

	/* Smooth Hash Link Scroll ======================================= */	
	$('.smooth-scroll').click(function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				// console.log(offset());
				$('html,body').animate({
						scrollTop: target.offset().top - 60
				}, 1000);
				return false;
			}
		}
	});
		
	/* Project Preview	==============================================*/
	$('.img-box').click(function(e) {
		e.preventDefault();
		var elem = $(this).parent(),
			title = elem.find('.project-title').text(),
			price = elem.find('.project-price').text(),
			descr = elem.find('.project-description').html(),
			slidesHtml = '<div class="slides-container">',
			elemDataCont = elem.find('.project-description');
			slides = elem.find('.project-description').data('images').split(',');
		for (var i = 0; i < slides.length; ++i) {
			slidesHtml = slidesHtml + '<img src=' + slides[i] + ' alt="">';
		}
		slidesHtml = slidesHtml + '</div><nav class="slides-navigation"><a href="#" class="next"><i class="icon-arrow-right"></i></a><a href="#" class="prev"><i class="icon-arrow-left"></i></a></nav>';
		$('#project-modal').on('show.bs.modal', function() {
			$(this).find('#sdbr-title').text(title);
			$(this).find('#sdbr-price').text(price);
			$(this).find('#project-content').html(descr).append('<a id="btn-order" class="btn btn-store btn-right"  href="#">Order now</a>');
			$(this).find('.screen').addClass('slides').html(slidesHtml);
			if (elemDataCont.data('oldprice')) {
				$(this).find('#sdbr-oldprice').show().text(elemDataCont.data('oldprice'))
			} else {
				$(this).find('#sdbr-oldprice').hide();
			}
			if (elemDataCont.data('descr')) {
				$(this).find('#sdbr-descr').show().text(elemDataCont.data('descr'))
			} else {
				$(this).find('#sdbr-descr').hide();
			}
			setTimeout(function() {
				$('.slides').superslides({
					inherit_height_from: '.modal-header'
				});
				$('#project-modal .screen').addClass('done').prev('.loader').fadeOut();
			}, 1000);
		}).modal();
	});

	$('#project-modal').on('hidden.bs.modal', function() {
		$(this).find('.loader').show();
		$(this).find('.screen').removeClass('slides').removeClass('done').html('').superslides('destroy');
	});

	$('#project-modal').on( 'click', '#btn-order',function () {
		$('#project-modal').modal('hide');
		$(this).find('.loader').show();
		$(this).find('.screen').removeClass('slides').removeClass('done').html('').superslides('destroy');
		var aTag = $("section[id='orderform']");
		$('html,body').animate({scrollTop: aTag.offset().top},'slow');
	});

});