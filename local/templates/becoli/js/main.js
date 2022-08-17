function is_mobile() {
	return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
}
$(window).on('load', function() {
	 if (!is_mobile()) {
		$('.wrapper-loader').addClass('is-fade');
		 setTimeout(function() {
		 	$('.wrapper-loader').fadeOut(200);
		 }, 1000);

		AOS.init({
	    duration: 800,
	    offset: 200,
	    once: true,
	    anchorPlacement: 'top-bottom',
	  });
	}
	heightHead = parseInt($('.ui-header').outerHeight());
	jQuery(window).on("scroll load", function() {
		if ($(window).scrollTop() > heightHead) {
			 $('.ui-header').addClass('fixed-menu');
			 setTimeout(function() {
			 	$('.ui-header').addClass('scroll-transform');
			 }, 100);
		} else {
			$('.ui-header').removeClass('fixed-menu');
			$('.ui-header').removeClass('scroll-transform');
		}
		if ($(window).scrollTop() > $(window).height()) {
			$('.scroll-to-top').addClass('scroll-to-top-visible');
		} else {
			$('.scroll-to-top').removeClass('scroll-to-top-visible');
		}	
	});
		
});
jQuery(document).ready(function($) {
	 if (is_mobile()) {
	  	$('.wrapper-loader').addClass('is-fade');
	  	setTimeout(function() {
	  		$('.wrapper-loader').fadeOut(150);
	  	}, 500);
	  }
	lazyLoad($('body'));
	if (is_mobile()) {
		$(document).find("*").removeAttr('data-aos');
	}
	$(".hamburger").on("click", function() {
		$(this).toggleClass('is-active');
		$('.head-nav').toggleClass('is-open');
		$('.bg-overlay').fadeToggle(200);
		if (is_mobile()) {
			$('html').toggleClass('is-hidden');
		}
	});
	$(".menu_close-btn").on("click", function() {
		$('.hamburger').removeClass('is-active');
		$('.head-nav').removeClass('is-open');
		$('.bg-overlay').fadeOut(200);
		if (is_mobile()) {
			$('html').removeClass('is-hidden');
		}
	});
	$(".bg-overlay").on("click", function() {
		$('.hamburger').removeClass('is-active');
		$('.head-nav').removeClass('is-open');
		$(this).fadeOut(200);
		if (is_mobile()) {
			$('html').removeClass('is-hidden');
		}
	});

	$('.js_arrow-down').on('click', function() {
    var myOffset = $('.advantages-section').offset().top;
    $('html, body').animate({
      scrollTop: myOffset
    }, 1200);
  });

	$('.services-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		prevArrow: '<span class="ico-arrow slick-prev"></span>',
    nextArrow: '<span class="ico-arrow slick-next"></span>',
    appendArrows: $('.services-arrows'),
		responsive: [
		{
			breakpoint: 576,
			settings: {
				speed: 400,
			}
		}, 
		]
	});
	if ($('.services-slider').length) {
		var number = $(".services-slider").find('.slick-slide:not(.slick-cloned)').length;
		var currentIndex = $(".services-slider").find('.slick-active').index();
		$('.services-counter').find('.pagination-digit').text("0" + number);
		$('.services-counter').find('.pagination-number').text("0" + (currentIndex +1));
		$(".services-slider").on('afterChange', function() {
			var number = $(this).find('.slick-slide:not(.slick-cloned)').length;
			currentIndex = $(this).find('.slick-active').index();
			$('.services-counter').find('.pagination-digit').text("0" + number);
			$('.services-counter').find('.pagination-number').text("0" + (currentIndex +1));
		});
	}

	$('.projects-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: '<span class="ico-arrow slick-prev"></span>',
    nextArrow: '<span class="ico-arrow slick-next"></span>',
    appendArrows: $('.projects-arrows'),
		centerMode: true,
		centerPadding: '17%',
		responsive: [{
			breakpoint: 576,
			settings: {
				speed: 400,
				centerPadding: '10%',
			}
		}, ]
	})
	$('.form-control').focus(function() {
		$(this).closest('.form-group').addClass('focus');
		$(this).closest('.form-group').find('.input_delete-text').addClass('is-visible');
	});
	$('.form-control').blur(function() {
		if ($(this).val().length == 0) {
			$(this).closest('.form-group').removeClass('focus');
			$(this).closest('.form-group').find('.input_delete-text').removeClass('is-visible');
		}
	});
	$('form').find('.form-control').each(function() {
		if ($(this).val().length > 1) {
			$(this).closest('.form-group').addClass('focus');
		}
	})
	$('.input_delete-text').on("click", function() {
		$(this).closest('.form-group').find('.form-control').val(' ');
		$(this).closest('.form-group').removeClass('focus');
		$(this).removeClass('is-visible');
	});
	$('.js_form-submit').on("click", function() {
		var jhis = $(this).closest('form');
		$(jhis).find('.requiredField').removeClass('input-error');
		$(jhis).find('.error').remove();
		$(jhis).find('.form-group').removeClass('is-error');
		var error = 0;
		$(jhis).find('.requiredField').each(function() {
			if ($(this).hasClass('callback-phone')) {
				if ($(this).val().length < 10) {
					$(this).closest('.form-group').addClass('is-error');
					$(this).after('<span class="error">Enter the correct number</span>');
					$(this).addClass('input-error');
					error = 1;
				}
			} else if ($(this).hasClass('callback-email')) {
				var emailReg = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
				if (emailReg.test($(this).val()) == false) {
					$(this).closest('.form-group').addClass('is-error');
					$(this).after('<span class="error">Enter correct E-mail</span>');
					$(this).addClass('input-error');
					error = 2;
				}
			} else if ($(this).hasClass('callback-name')) {
				if ($(this).val().length < 3) {
					$(this).closest('.form-group').addClass('is-error');
					$(this).addClass('input-error');
					$(this).after('<span class="error">Incorrect data</span>');
					error = 3;
				}
			} else if ($(this).hasClass('callback-text')) {
				if ($(this).val().length < 2) {
					$(this).closest('.form-group').addClass('is-error');
					$(this).addClass('input-error');
					$(this).after('<span class="error">Fill in the field</span>');
					error = 4;
				}
			}
		});
		if (error == 0) {
			/*отправка формы**/
		} else {
			return false;
		}
	});

	(function() {
		var youtube = document.querySelectorAll(".youtube");
		for (var i = 0; i < youtube.length; i++) {
			var source = "https://img.youtube.com/vi/" + youtube[i].dataset.embed + "/sddefault.jpg";
			var image = new Image();
			image.src = source;
			image.addEventListener("load", function() {
				youtube[i].appendChild(image);
			}(i));
			youtube[i].addEventListener("click", function() {
				var iframe = document.createElement("iframe");
				iframe.setAttribute("frameborder", "0");
				iframe.setAttribute("allowfullscreen", "");
				iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.embed + "?rel=0&showinfo=0&autoplay=1");
				this.innerHTML = "";
				this.appendChild(iframe);
			});
		};
	})();

	$('.js_application-btn').on("click", function() {
		$('#services-popup').modal('hide');
		setTimeout(function() {
		 	$('#callback').modal('show');
		 }, 400);
		return false;
	});
		
			
	$(".fancybox").fancybox({
		afterLoad: function(instance, current) {
			if (!is_mobile()) {
				$('.fixed-menu').addClass('is-overflow');
				$('.scroll-to-top').addClass('is-hidden');
			}
		},
		afterClose: function(instance, current) {
			if (!is_mobile()) {
				$('.fixed-menu').removeClass('is-overflow');
				$('.scroll-to-top').removeClass('is-hidden');
			}
		}
	});
	if (!is_mobile()) {
		$('.js-modal').on('show.bs.modal', function(event) {
			$('.ui-header').addClass('is-overflow');
			$('.scroll-to-top').addClass('is-hidden');
		});
		$('.js-modal').on('hidden.bs.modal', function(event) {
			$('.ui-header').removeClass('is-overflow');
			$('.scroll-to-top').removeClass('is-hidden');
		});
	}
	jQuery(window).on("scroll load resize", function() {
		var $sections = $('.section');
		$sections.each(function(i, el) {
			var top = $(el).offset().top;
			var bottom = top + $(el).height();
			var scroll = $(window).scrollTop();
			var heightHead = $('.ui-header').outerHeight();
			var id = $(el).attr('id');
			if($(this).hasClass('main-footer')){
				if (scroll + $(window).height()+ 1 > top + $('.main-footer').outerHeight()) {
					$('.head-menu a.anchor').removeClass('active');
					$('.head-menu a.anchor[href="#' + id + '"]').addClass('active');
				}
			} else{
				if (scroll + heightHead > top && scroll < bottom) {
					$('.head-menu a.anchor').removeClass('active');
					$('.head-menu a.anchor[href="#' + id + '"]').addClass('active');
				}
			}
		});
	});
	$(".head-menu,.footer-menu").on("click", "a", function(event) {
		var heightHead = $('.ui-header').outerHeight();
		if ($(this).hasClass('anchor')) {
			event.preventDefault();
			var id = $(this).attr('href'),
				top = $(id).offset().top;
			$('body,html').animate({
				scrollTop: top - heightHead +10
			}, 1500);
		}
	});
	if ($(window).width() < 767) {
		$(".head-menu").on("click", "a", function() {
			if ($(this).hasClass('anchor')) {
				$('.head-nav').removeClass('is-open');
				$('.hamburger').removeClass('is-active');
				$('.bg-overlay').fadeOut(150);
				$('html').removeClass('is-hidden');
			};
		});
	}
	$('.scroll-to-top').on('click', function() {
		$('html, body').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	$('input[type="tel"]').inputmask("+49 (9999) 99 99 99", {
		"clearIncomplete": true,
		showMaskOnHover: false,
	});
});
function lazyLoad($content) {
		$content.find('img[data-src], source[data-src], audio[data-src], iframe[data-src]').each(function() {
			$(this).attr('src', $(this).data('src'));
			$(this).removeAttr('data-src');
			if ($(this).is('source')) {
				$(this).closest('video').get(0).load();
			}
		});
	}
