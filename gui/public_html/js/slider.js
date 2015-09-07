jQuery(document).ready(function ($) {

    $.fn.slider = function (options) {

        // Options
        var settings = $.extend({
            slideShow: false,
            startOn: 0,
            speed: 2000,
            transition: 800,
            arrows: true
        }, options);

        return this.each(function () {
            // Variables
            var wrapper = $(this);
            var slides = wrapper.children().wrapAll('<div class="slide-body"/>').addClass('slide');
            var slider = wrapper.find('.slide-body');
            var slide_count = slides.length;
            var transition = settings.transition;
            var starting_slide = settings.startOn;
            var target = starting_slide > slide_count - 1 ? 0 : starting_slide;
            var animating = false;
            var clicked;
            var timer;
            var key;
            var prev;
            var next;
            // Reset Slideshow
            var reset_timer = settings.slideShow ? function () {
                clearTimeout(timer);
                timer = setTimeout(next_slide, settings.speed);
            } : $.noop;

            // Animate Slider
            function get_height(target) {
                return ((slides.eq(target).height() / slider.width()) * 100) + '%';
            }
            function animate_slide(target) {
                if (!animating) {
                    animating = true;
                    var target_slide = slides.eq(target);

                    target_slide.fadeIn(transition);
                    slides.not(target_slide).fadeOut(transition);

                    slider.animate({paddingBottom: get_height(target)}, transition, function () {
                        animating = false;
                    });
                    reset_timer();
                }
            }

            // Next Slide
            function next_slide() {
                target = target === slide_count - 1 ? 0 : target + 1;
                animate_slide(target);
            }

            // Prev Slide
            function prev_slide() {
                target = target === 0 ? slide_count - 1 : target - 1;
                animate_slide(target);
            }

            if (settings.arrows) {
                slider.append('<div class="prev-btn"/>', '<div class="next-btn"/>');
            }

            next = slider.find('.prev-btn');
            prev = slider.find('.next-btn');

            $(window).load(function () {
                slider.css({paddingBottom: get_height(target)}).click(function (e) {
                    clicked = $(e.target);
                    if (clicked.is(next)) {
                        next_slide()
                    } else if (clicked.is(prev)) {
                        prev_slide()
                    }
                });
                animate_slide(target);
                $(document).keydown(function (e) {
                    key = e.keyCode;
                    if (key === 39) {
                        next_slide()
                    } else if (key === 37) {
                        prev_slide()
                    }
                });
            });

        });
    };


});
