(function ($) {
    'use strict';

    // Page Loader
    $(document).ready(function () {
        // Check dark mode and apply to loader
        const isDarkMode = localStorage.getItem('darkMode') === 'true';
        if (isDarkMode) {
            $('#page-loader').addClass('dark-theme-loader');
            $('body').addClass('dark-theme');
        }

        // Hide loader after 500ms
        setTimeout(function () {
            $('#page-loader').addClass('hide');
            $('#page-content').css('opacity', '1');
        }, 500);

        $(document).on('click', 'a', function (e) {
            const href = $(this).attr('href');
            const target = $(this).attr('target');
            if (href && !href.startsWith('#') && !href.startsWith('http') && !href.startsWith('//') &&
                !href.startsWith('mailto:') && !href.startsWith('tel:') && !href.startsWith('javascript:') &&
                target !== '_blank' && !$(this).hasClass('lets-talk-btn')) {

                e.preventDefault();
                const isDark = $('body').hasClass('dark-theme');
                if (isDark) {
                    $('#page-loader').addClass('dark-theme-loader');
                } else {
                    $('#page-loader').removeClass('dark-theme-loader');
                }
                $('#page-loader').removeClass('hide');
                $('#page-content').css('opacity', '0');
                setTimeout(function () {
                    window.location.href = href;
                }, 500);
            }
        });
    });

    // Theme color control js
    $(document).ready(function () {
        const isDarkMode = localStorage.getItem('darkMode') === 'true';
        $('body').toggleClass('dark-theme', isDarkMode);

        $('.theme-control-btn').on('click', function () {
            $('body').toggleClass('dark-theme');

            const isDark = $('body').hasClass('dark-theme');
            localStorage.setItem('darkMode', isDark);
        });
    });

    // Mobile menu control js
    $('.mobile-menu-control-bar').on('click', function () {
        $('.mobile-menu-overlay').addClass('show');
        $('.navbar-main').addClass('show');
    });
    $('.mobile-menu-overlay').on('click', function () {
        $('.mobile-menu-overlay').removeClass('show');
        $('.navbar-main').removeClass('show');
    });

    // Parallax scroll effect js
    document.querySelectorAll('.move-with-cursor').forEach((a) => {
        document.addEventListener('mousemove', function (e) {
            var t = e.clientX,
                e = e.clientY;
            (a.style.transition = 'transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)'),
                (a.style.transform = `translate(${0.01 * t}px, ${0.01 * e}px) rotate(${0.01 * (t + e)
                    }deg)`);
        });
    }),
        // Email copy button js
        new ClipboardJS('.btn-copy');

    // Email copy button tooltip js
    $(document).ready(function () {
        $('.btn-copy').on('click', function () {
            $(this).addClass('active');

            setTimeout(() => {
                $(this).removeClass('active');
            }, 1000);
        });
    });

    // Magnific popup js
    $('.parent-container').magnificPopup({
        delegate: '.gallery-popup',
        type: 'image',
        gallery: {
            enabled: true,
        },
    });

    // Client feedback slider js - Initialize after page content is visible
    $(document).ready(function () {
        setTimeout(function () {
            if ($('.client-feedback-slider').length && !$('.client-feedback-slider').hasClass('slick-initialized')) {
                $('.client-feedback-slider').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: false,
                    dots: false,
                    infinite: true,
                    arrows: true,
                    speed: 500,
                    prevArrow: '<i class="fas left icon fa-arrow-left"></i>',
                    nextArrow: '<i class="fas right icon fa-arrow-right"></i>',
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            },
                        },
                    ],
                });
            }
        }, 600);
    });

    // Article publications slider js - Initialize after page content is visible
    $(document).ready(function () {
        setTimeout(function () {
            if ($('.article-publications-slider').length && !$('.article-publications-slider').hasClass('slick-initialized')) {
                $('.article-publications-slider').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: false,
                    dots: false,
                    infinite: true,
                    arrows: true,
                    speed: 500,
                    prevArrow: '<i class="fas left icon fa-arrow-left"></i>',
                    nextArrow: '<i class="fas right icon fa-arrow-right"></i>',
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            },
                        },
                    ],
                });
            }
        }, 600);
    });
})(jQuery);
