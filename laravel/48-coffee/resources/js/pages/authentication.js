// authentication section
"use strict";

import Feedback from '../model/feedback';

// prepare document
$(document).ready(() => {

    let milliseconds = 250;
    
    const loginFixed = $('.login-fixed');
    const regsiterFixed = $('.register-fixed');
    const closeBtn = $('.close-btn');
    const register = $('.register-btn');
    const headerFormControl = $('.header form, .header .login-description, .login-btn, .register-btn');
    const cardCover = $('.card .cover');
    const cardBody = $('.card .card-body');
    const feedbackLeft = $('.feedback-left');

    register.on('click', () => { 
        regsiterFixed.fadeIn(milliseconds); 
        headerFormControl.fadeOut(milliseconds);
        cardBody.fadeOut(milliseconds, () => { feedbackLeft.fadeIn(milliseconds); });
        loginFixed.addClass('primary');
        cardCover.addClass('whiten');
    });

    closeBtn.on('click', () => { 
        regsiterFixed.fadeOut(milliseconds); 
        feedbackLeft.fadeOut(milliseconds); 
        cardBody.fadeIn(milliseconds, () => { headerFormControl.fadeIn(milliseconds); });
        cardCover.removeClass('whiten');
        loginFixed.removeClass('primary');
    });

    new Feedback($('.feedback-column'), $('.feedback-left'), feedbacks).setDetails();

});