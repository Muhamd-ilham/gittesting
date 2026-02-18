jQuery(document).ready(function($) {
    if (typeof wp !== 'undefined' && typeof wp.customize !== 'undefined') {
        setTimeout(function() {
            $('.customize-partial-edit-shortcut-button').on('click', function() {
                var id      = $(this).parent().parent().attr('data-customize-partial-id');
                window.parent.postMessage({
                    id: id,
                }, '*');
            });
            $('.customize-partial-edit-shortcut-button').hover(function() {
                $(this).parent().parent().toggleClass('_marked');
            });
            $('[data-helper-title]').each(function() {
                var title = $(this).data('helper-title');
                if ($(this).css('position') !== 'fixed') {
                    $(this).css('position', 'relative');
                }
                $(this).append('<div class="customizer-helper">' + title + '</div>');
            });
        }, 3000);
    } else {
        $('[data-helper-title]').each(function() {
            var title = $(this).data('helper-title');
            var tab = $(this).data('helper-tab');
            var link = $(this).data('helper-link');
            var pos = $(this).data('helper-position');
            var helperLink = (typeof tab !== 'undefined' && tab !== null && tab !== '') ? optUrl + tab : link;

            if (typeof pos !== 'undefined' && pos !== null && pos !== '') {
                var position = pos;
            } else if ($(this).css('overflow') === 'hidden' || $(this).css('overflow-y') === 'auto') {
                var position = '_top-left20';
            }
            if ($(this).css('position') !== 'fixed') {
                $(this).css('position', 'relative');
            } 
            
            var helperMessage = 'Klik untuk edit <strong>' + title + '</strong>';
            $(this).append('<div data-href="' + helperLink + '" class="helper-message ' + position + '"><span>' + helperMessage + '</span></div>');
            $(this).find('.helper-message').hover(function() {
                $(this).parent().toggleClass('_marked');
            });
        });
        $('body').append('<div class="helper-switch _toggle">Shortcut <b class="_status"></b></div><div class="helper-switch _customizer" data-href="' + cusUrl + '">Customizer Live</div><div class="helper-switch _options" data-href="' + optUrl + '">Theme Options</div>');
    }

    const saved_helper   = getCookie("oke_helper");
    $(".helper-switch._toggle").click(function() {
        $('.helper-message').toggle(); 
        if ($(this).hasClass('_active')) {
            $(this).removeClass('_active');
            $(".helper-switch._customizer, .helper-switch._options").hide();
            document.cookie = `oke_helper=0; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/`;
        } else {
            $(this).addClass('_active');
            $(".helper-switch._customizer, .helper-switch._options").css('display', 'flex');
            document.cookie = `oke_helper=1; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/`;
        }
    });
    if (saved_helper === '1') {
        $(".helper-switch._toggle").addClass('_active');
        $(".helper-message").show();
        $(".helper-switch._customizer, .helper-switch._options").css('display', 'flex');
    }
});