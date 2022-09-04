// home section
"use strict";

import RSPComponent from '../model/rspcomponent';
import Restaurant from '../model/restaurant';

// prepare document
$(document).ready(() => {

    // manipulate the components from (RSP) Coffee Restaurant Short Paragraphs
    const rspContainer = $('.rsp .paragraphs');

    // loop the collection and modify the RSP content
    rspCollection.forEach(list => {
        new RSPComponent(list).setTemplate(rspContainer);
    });

    // manipulate the components of Restaurant Collections
    const restaurant = $('.restaurant #collection');
    const places = $('.restaurant .details');
    
    // loop the collections to manipulate the Restaurant Collections
    const restaurant_obj = new Restaurant(settings).setTemplate(restaurant).setDetails(places, { 
        ...settings[0], // the first element should run first at 0 index
        index: 0, max: settings.length
    }, settings);

    // trigger prev & next
    places.on('click', '.next .col-lg-6', event => {
        triggerLink(event); // the selected element should display when click the prev & next btn
    })

    // trigger image
    restaurant.on('click', '.restaurant-item', event => {
        triggerLink(event); // the selected element should display base on the clicked image
    })

    // linked list trigger
    const triggerLink = ev => {
        const index = Number.parseInt($(ev.currentTarget).attr('data-index'));
        restaurant_obj.setDetails(places, { 
            ...settings[index],
            index: index , max: settings.length
        }, settings);
    };

});