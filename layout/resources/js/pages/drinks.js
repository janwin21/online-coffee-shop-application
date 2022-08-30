// drinks section
"use strict";

// prepare document
$(document).ready(() => {

    const parent = $('.coffee-shop');

    const settings = [
        {
            coffeeType: 'hot coffee',
            selectedIndex: 0,
            data: [
                { 
                    name: 'cuban coffee',
                    available: 24,
                    price: 60.99
                },
                { 
                    name: 'french cafe au lait',
                    available: 4,
                    price: 99.99
                },
                { 
                    name: 'the perfect cappuccino',
                    available: 20,
                    price: 88.99
                }
            ]
        },
        {
            coffeeType: 'cold coffee',
            selectedIndex: 0,
            data: [
                { 
                    name: 'affogato',
                    available: 10,
                    price: 79.99
                },
                { 
                    name: 'maple pecan latte',
                    available: 12,
                    price: 23.5
                },
                { 
                    name: 'white chocolate mocha',
                    available: 5,
                    price: 86.00
                }
            ]
        }
    ];

    const coffeeTable = new CoffeeTable(
        $('.coffee-buy-table table'), 
        $('#amount'), $('.take-out, .dine-in')
    ).setServiceBtn();

    const coffeeOrder = new CoffeeOrder(settings, parent)
        .setDetails().addCoffeeTable(coffeeTable)
        .setEvent('.card-coffee-item');

});