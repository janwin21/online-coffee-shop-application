// drinks section
"use strict";

import CoffeeHeader from '../model/coffee-header';
import CoffeeOrder from '../model/coffee-order';
import CoffeeTable from '../model/coffee-table';

// prepare document
$(document).ready(() => {

    let milliseconds = 500, interval = 4000;
    
    $('.animated-cover').fadeOut(milliseconds); // immediately fade out
    
    const parent = $('.coffee-shop');

    // coffee header
    const coffeeHeader = new CoffeeHeader($('.coffee-header'))
        .setSettings(settings)
        .setDetails(0) // start at the first index
        .setAnimation(milliseconds, interval);

    // coffee table
    const coffeeTable = new CoffeeTable(
        $('.coffee-buy-table table'), 
        $('#amount'), $('#table-size'), 
        $('#table-service'), $('.take-out, .dine-in, .delivery')
    ).setInputs($('#col-names'), $('#col-types'), $('#col-quantities')).setServiceBtn();

    // coffee order
    new CoffeeOrder(settings, parent)
        .setDetails()
        .addCoffeeHeader(coffeeHeader)
        .addCoffeeTable(coffeeTable)
        .setEvent('.card-coffee-item');

});