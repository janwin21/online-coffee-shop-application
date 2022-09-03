// queue section
"use strict";

// prepare document
$(document).ready(() => {

    let navbar = $('.navbar');

    $('.queue-header button').on('click', event => {
        $('html, body').animate({
            scrollTop: 
                $(`#${event.currentTarget.dataset.nav}`).offset().top - navbar.outerHeight()
        }, 10);
    });

});