(function ($) {
	var ua = window.navigator.userAgent;
	var isIE = /MSIE|Trident/.test(ua);

	if ( !isIE ) {
		"use strict";
	}

	$('.navigation__toggler').sidr({
        side: 'right',
        displace: false,
        renaming: false,
        name: 'sidr-main',
        source: '#sidr-main',
    });

    $('.sidrclose').on('click', function(e){
        e.preventDefault();
        $.sidr('close', 'sidr-main');
    });

    $(window).scroll(function(){
        if($("body").scrollTop() > 0 || $("html").scrollTop() > 0) {
            $.sidr('close', 'sidr-main');
        }
    });

    $('.sscroll, .sscroll a').click(function(event) {
        event.preventDefault();

        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                   scrollTop: target.offset().top + 2
                }, 1000);

               return false;
            }
        }
    });

    if (document.querySelector('.anchor-links')) {
        const scrollUp = "scroll-up";
        const scrollDown = "scroll-down";
        let lastScroll = 0;

        const debounce = (func, wait) => {
            let timeout;
            return (...args) => {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        };

        const updateActiveLinks = () => {
            const scrollTop = window.pageYOffset;
            const scrollDirection = scrollTop > lastScroll ? scrollDown : scrollUp;
            lastScroll = scrollTop;

            document.querySelectorAll('.anchor-link').forEach(el => {
                const targetSelector = el.getAttribute('href');
                const target = document.querySelector(targetSelector);

                if (target) {
                    const topPos = target.getBoundingClientRect().top + scrollTop;

                    if (scrollTop >= topPos) {
                        document.querySelectorAll('.anchor-links li').forEach(li => li.classList.remove('active'));
                        el.parentElement.classList.add('active');
                        target.classList.add('active');
                    } else {
                        target.classList.remove('active');
                    }
                }
            });
        };

        const scrollHandler = debounce(updateActiveLinks, 50);
        window.addEventListener('scroll', scrollHandler);
    }

    $('div.wp-block-image, figure.wp-block-image').magnificPopup({
        delegate: 'a:not(.wp-block-gallery a)',
        type: 'image',
        midClick: true,
        fixedBgPos: true,
        removalDelay: 500,
        fixedContentPos: true,
        closeBtnInside: false,
        tLoading: 'Loading image #%curr%...',
        image: {
            verticalFit: true,
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.find('img').attr('alt');
            }
        },
        callbacks: {
            beforeOpen: function() {
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = 'mfp-move-from-top vertical-middle';
            }
        },
        closeOnContentClick: true,
        midClick: true,
        closeMarkup: '<button title="Close (Esc)" type="button" class="mfp-close">Close <span class="icon"><ion-icon name="close-outline"></ion-icon></span></button>',
    });

    $('figure.wp-block-gallery').each(function() {
        $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            midClick: true,
            preloader: false,
            fixedBgPos: true,
            removalDelay: 500,
            fixedContentPos: true,
            closeBtnInside: false,
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            },
            image: {
                verticalFit: true,
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.find('img').attr('alt');
                }
            },
            callbacks: {
                beforeOpen: function() {
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = 'mfp-move-from-top vertical-middle';
                },
            },
            closeMarkup: '<button title="Close (Esc)" type="button" class="mfp-close">Close <span class="icon"><ion-icon name="close-outline"></ion-icon></span></button>',
        });
    });

}(jQuery));