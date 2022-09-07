// queue section
"use strict";

// prepare document
$(document).ready(() => {

    let navbar = $('.navbar');
    let body = $('html, body');
    let finalize = $('.finalize-input');

    $('.queue-header button').on('click', event => {
        let queueBtn = $(`#${event.currentTarget.dataset.nav}`);

        body.animate({
            scrollTop: (queueBtn.length > 0) ? queueBtn.offset().top - navbar.outerHeight() :
                body.offset().top
        }, 10);
    });

    $('.finalize-btn').click(event => {
        finalize.val(event.currentTarget.dataset.value);
    });

});