// Document Ready
jQuery(document).ready(function($) {

    // Data Href Link
    $(document).on("click", "[data-href]", function() {
        window.open($(this).data("href"), 'blank');
    });

    // Banner Mobile
    $('.banner-mobile ._close').click(function() {
        $(".banner-mobile").slideUp();
    });

    // Floating Banner Close
    $('.banner-floating ._close').click(function() {
        $(this).parent().hide();
    });

    // Floating Banner Bottom Height
    let $banner = $('.banner-floating._bottom');
    let threshold = 50; // Jarak 50px dari bawah
    $(window).on('scroll resize', function() {
        let scrollTop = $(window).scrollTop();
        let windowHeight = window.visualViewport ? window.visualViewport.height : $(window).height();
        let documentHeight = $(document).height();
        let distanceFromBottom = documentHeight - (scrollTop + windowHeight);

        if (distanceFromBottom < threshold) {
            $banner.css('bottom', '-220px');
        } else {
            $banner.css('bottom', '0px');
        }
    });


    // Scroll To Top
    $('.scrollup').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
    });

    $(window).scroll(function() {
    
        // Scroll To Top
        $('.scrollup').toggleClass('_show', $(this).scrollTop() >= 150);

        // Going up App Button
        $('.pwa-bttn').toggleClass('_left', $(this).scrollTop() >= 140);
    
        // Floating Ads
        $('.banner-floating._side').toggleClass('_fixed', $(this).scrollTop() >= 380);
    
        // Top Header
        $('.header._sticky').toggleClass('_shrink', $(this).scrollTop() >= 380);
    });

    // Top Search Mobile
    $('.toggle-search').click(function() {
        $('.top-search').append('<span class="_close">&times;</span>').addClass('_active').find('input').focus();
        $('body').addClass('no-scroll');
        $('.top-search ._close').on('click', function() {
            $(this).parent().removeClass('_active');
            $('body').removeClass('no-scroll');
            $(this).remove();
        });
    });

    // ------------- Top Menu ------------- //

    // Top Menu Toggle
    $('.toggle-menu').click(function() {
        $('.top-menu').slideToggle();
        if ($(this).find('i').html() == 'menu') {
            $(this).find('i').html('expand_less');
            $(this).addClass('swap');
        } else {
            $(this).find('i').html('menu');
            $(this).removeClass('swap');
        }
    });

    // Top Menu Submenu
    $('.top-menu > ul > li:has(> .sub-menu, > .children)').each(function() {
        $(this).append('<span class="m-icon">expand_more</span>'); // Menambah span untuk "icon"
    });

    $('.top-menu > ul > li:has(> .sub-menu, > .children) > span').on('click', function() {
        // Tutup semua .sub-menu dan .children level 1 yang aktif kecuali milik elemen yang diklik
        $('.top-menu > ul > li > .sub-menu, .top-menu > ul > li > .children').not($(this).siblings('.sub-menu, .children')).hide();

        // Set semua icon level 1 kembali ke 'expand_more' kecuali milik elemen yang diklik
        $('.top-menu > ul > li > span').not($(this)).html('expand_more').parent().removeClass('_active');

        // Toggle submenu atau children untuk item yang diklik
        $(this).siblings('.sub-menu, .children').toggle();

        // Ganti icon berdasarkan status submenu (expand_more atau expand_less)
        if ($(this).html() == 'expand_more') {
            $(this).html('expand_less').parent().addClass('_active');
        } else {
            $(this).html('expand_more').parent().removeClass('_active');
        }
    });

    // Auto show toggle menu mobile
    if ($('.top-menu').width() > 700) {
        $('.toggle-menu').show();
        $('.top-menu').addClass('_mobile');
        $('.top-logo').addClass('_mobile');
    }

    // ------------- Sidebar ------------- //

    // Sidebar Close Mobile
    $('.side-close').click(function() {
        $('#sidebar').toggleClass('active');
        if($(this).find('i').html() == 'right_panel_open' || $(this).find('i').html() == 'left_panel_open') {
            $(this).find('i').html('close');
        } else if($(this).parent().hasClass('_left')) {
            $(this).find('i').html('left_panel_open');
        } else {
            $(this).find('i').html('right_panel_open');
        }
    });

    // Slider untuk #head-blog
    if ($('#head-blog').length) {
        var slider = new Splide('#head-blog', {
            type: 'loop',
            interval: 8000,
            padding: '240px',
            autoplay: true,
            gap: '10px',
            pagination: false,
            breakpoints: {
                1080: {
                    perPage: 1,
                    padding: 0,
                },
            }
        });
        slider.mount();
    }

    // Slider untuk #feat-blog
    if ($('#feat-blog._nobg .splide').length) {
        var slider = new Splide('#feat-blog._nobg .splide', {
            type: 'loop',
            perPage: 4,
            autoplay: true,
            rewind: true,
            gap: '10px',
            pagination: false,
            breakpoints: {
                1080: {
                    perPage: 3,
                },
                760: {
                    perPage: 2,
                },
            }
        });
        slider.mount();
    }
    if ($('#feat-blog._bg .splide').length) {
        var slider = new Splide('#feat-blog._bg .splide', {
            type: 'loop',
            perPage: 4,
            autoplay: true,
            rewind: true,
            gap: '16px',
            pagination: false,
            breakpoints: {
                1080: {
                    perPage: 3,
                },
                760: {
                    perPage: 2,
                },
                380: {
                    perPage: 1,
                },
            }
        });
        slider.mount();
    }

    // Slider untuk #flash-blog .splide
    if ($('#flash-blog .splide').length) {
        var slider = new Splide('#flash-blog .splide', {
            type: 'loop',
            rewind: true,
            interval: 3000,
            autoplay: true,
            pagination: false,
            arrows: false,
        });
        slider.mount();
    }

    // Inisialisasi semua slider dengan class .post-slider._regular
    $('.post-slider._regular').each(function () {
        new Splide(this, {
            type: 'loop',
            perPage: 3,
            autoplay: true,
            rewind: true,
            gap: '10px',
            pagination: false,
            breakpoints: {
                760: {
                    perPage: 2,
                },
            }
        }).mount();
    });

    $('.splide__slide').removeAttr('aria-roledescription');

    // Print Artikel
    $('#printBttn').on('click', function () {
        var printContents = $('#printArea').clone();
        printContents.find('.m-icon, .shareit, ._font-size, .related-content, ._info, .post-edit-link').remove();
        $('body').html(printContents).css('background', '#fff');
        window.onafterprint = function(){
            location.reload();
        };
        window.print();
    });

});

// Font Size Control
jQuery(document).ready(function($){
    var minFont = 12;
    var maxFont = 30;
    var step    = 2;
    
    var artikel = $(".single-content ._artikel");
    var currentSize = parseInt(artikel.css("font-size"));

    $("#font-increase").click(function(){
        if(currentSize + step <= maxFont){
        currentSize += step;
        artikel.css("font-size", currentSize + "px");
        }
    });

    $("#font-decrease").click(function(){
        if(currentSize - step >= minFont){
        currentSize -= step;
        artikel.css("font-size", currentSize + "px");
        }
    });
});

// Horizontal Scroll
jQuery(document).ready(function($) {
    const $hscroll = $(".hscroll");

    let isDragging = false;
    let startX, scrollLeft;
    let dragThreshold = 5; // Batas pergerakan minimum untuk dianggap drag
    let hasDragged = false;

    $hscroll.on("mousedown", function (e) {
        isDragging = true;
        hasDragged = false; // Reset status drag
        startX = e.pageX - $(this).offset().left;
        scrollLeft = $(this).scrollLeft();
        $(this).css("cursor", "grabbing");
        e.preventDefault();
    });

    $(document).on("mousemove", function (e) {
        if (!isDragging) return;
        const $active = $(".hscroll:active");
        const x = e.pageX - $active.offset().left;
        const walk = (x - startX) * 1; // Sesuaikan sensitivitas
        if (Math.abs(walk) > dragThreshold) {
            hasDragged = true; // Tandai bahwa pengguna telah melakukan drag
        }
        $active.scrollLeft(scrollLeft - walk);
    });

    $(document).on("mouseup", function () {
        if (isDragging) {
            isDragging = false;
            $hscroll.css("cursor", "grab");
        }
    });

    $hscroll.on("mouseleave", function () {
        if (isDragging) {
            isDragging = false;
            $(this).css("cursor", "grab");
        }
    });

    // Cegah klik pada link selama drag
    $hscroll.find("a").on("click", function (e) {
        if (hasDragged) {
            e.preventDefault(); // Hentikan navigasi jika sedang drag
        }
    });

    // Scroll menggunakan wheel
    $hscroll.on("wheel", function (e) {
        e.preventDefault();
        const delta = e.originalEvent.deltaY;
        $(this).scrollLeft($(this).scrollLeft() + (delta > 0 ? 20 : -20));
    });
});

// Dark Mode
jQuery(document).ready(function($) {
    const saved_dark   = getCookie("warta_dark");
    $(".light-dark").click(function() {
        if ($(this).html() == 'light_mode') {
            $(this).html('dark_mode');
            // Load dark.css
            $('head').append('<link rel="stylesheet" type="text/css" href="'+themeDir+'/assets/css/dark.css" id="darkmode-stylesheet">');
            document.cookie = `warta_dark=1; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/`;
            if(logoDark) {
                $('.logo-web').attr('src', logoDark);
                $('.logo-img').show();
                $('.logo-text').hide();
            } else if(!logoLight) {
                $('.logo-img').hide();
                $('.logo-text').show();
            }
        } else {
            $(this).html('light_mode');
            // Remove dark.css
            $('#darkmode-stylesheet').remove();
            document.cookie = `warta_dark=0; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/`;
            if(logoLight) {
                $('.logo-web').attr('src', logoLight);
                $('.logo-img').show();
                $('.logo-text').hide();
            } else {
                $('.logo-img').hide();
                $('.logo-text').show();
            }
        }
    });
    if (saved_dark === '1' || (saved_dark === null && darkDefault)) {
        $(".light-dark").html('dark_mode');
    } else {
        $(".light-dark").html('light_mode');
    }
});

function getCookie(name) {
    let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
    return match ? match[2] : null;
}

