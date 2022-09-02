// drinks section
"use strict";

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
        $('#amount'), $('.take-out, .dine-in')
    ).setServiceBtn();

    // coffee order
    const coffeeOrder = new CoffeeOrder(settings, parent)
        .setDetails()
        .addCoffeeHeader(coffeeHeader)
        .addCoffeeTable(coffeeTable)
        .setEvent('.card-coffee-item');

});