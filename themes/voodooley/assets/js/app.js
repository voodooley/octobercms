// Application

jQuery(document).tooltip({
    selector: "[data-toggle=tooltip]"
});

/*
 * Auto hide navbar
 */
jQuery(document).ready(function ($) {
    let $header = $('.navbar-autohide'),
        scrolling = false,
        previousTop = 0,
        scrollDelta = 10,
        scrollOffset = 150;

    $(window).on('scroll', function () {
        if (!scrolling) {
            scrolling = true;

            if (!window.requestAnimationFrame) {
                setTimeout(autoHideHeader, 250)
            }
            else {
                requestAnimationFrame(autoHideHeader)
            }
        }
    });

    function autoHideHeader()
    {
        const currentTop = $(window).scrollTop();

        // Scrolling up
        if (previousTop - currentTop > scrollDelta) {
            $header.removeClass('is-hidden')
        }
        else if (currentTop - previousTop > scrollDelta && currentTop > scrollOffset) {
            // Scrolling down
            $header.addClass('is-hidden')
        }

        previousTop = currentTop;
        scrolling = false
    }
});
