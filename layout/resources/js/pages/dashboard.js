// authentication section
"use strict";

// prepare document
$(document).ready(() => {

    let milliseconds = 250;
    
    const dashboardModal = $('.dashboard-modal');
    const modalCancel = $('.modal .cancel');
    const deleteBtn = $('.card-album .btn-danger');
    const modalp = $('.modal-body p');
    const form = $('.delete-item-form');

    deleteBtn.click(event => {
        dashboardModal.fadeIn(milliseconds);
        modalp.text(`Do you what to delete the ${ event.currentTarget.dataset.name } item? This will permanenly remove the data.`);
        form.attr('action', event.currentTarget.dataset.url);
    });

    modalCancel.click(() => {
        dashboardModal.fadeOut(milliseconds);
    });

});