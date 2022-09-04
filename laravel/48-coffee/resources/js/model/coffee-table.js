// Coffee Table Model
"use strict";

export default function CoffeeTable(table, amount, serviceBtn) {
    this.table = table;
    this.amount = amount;
    this.serviceBtn = serviceBtn;

    // templates
    this.coffeeRowHeader = `
        <tr class="row px-4 mb-3">
            <th class="col open-sans text-light d-flex align-items-center">Drinks</th>
            <th class="col open-sans text-light d-flex align-items-center deletable">Type</th>
            <th class="col open-sans text-light d-flex align-items-center">Quantity</th>
            <th class="col open-sans text-light d-flex align-items-center deletable">Price</th>
            <th class="col open-sans text-light d-flex align-items-center">Amount</th>
            <th class="col open-sans text-light d-flex align-items-center"></th>
        </tr>
    `;

    this.coffeeRow = `<!-- Coffee Row Format -->
        <tr class="row px-4 my-0">
            <td class="col open-sans d-flex align-items-center px-2 pt-0 mx-0">
                <input type="text" name="coffee-name-{{ index }}" value="{{ coffee-name }}" disabled>
            </td>
            <td class="col open-sans d-flex align-items-center px-2 pt-0 mx-0 deletable">
                <input type="text" name="coffee-type-{{ index }}" value="{{ coffee-type }}" disabled>
            </td>
            <td class="col open-sans d-flex align-items-center px-2 pt-0 mx-0">
                <input type="text" name="quantity-{{ index }}" value="{{ quantity }}" disabled>
            </td>
            <td class="col open-sans d-flex align-items-center px-2 pt-0 mx-0 deletable">&#8369;{{ price }}</td>
            <td class="col open-sans d-flex align-items-center px-2 pt-0 mx-0">&#8369;{{ amount }}</td>
            <td class="col open-sans row d-flex align-items-center px-2 pt-0 mx-0">
                <div class="col-md-12 col-xl-6 px-0">
                    <button class="btn btn-danger shadow-none open-sans buy-delete" data-name="{{ coffee-name }}" data-index="{{ index }}" data-main-index="{{ mainIndex }}">Delete</button>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-3 px-0">
                    <button class="btn btn-danger shadow-none open-sans minus" data-name="{{ coffee-name }}" data-coffee-type="{{ coffee-type }}" data-available="{{ available }}" data-price="{{ price }}" data-index="{{ index }}" data-main-index="{{ mainIndex }}"><i class="fa-solid fa-minus"></i></button>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-3 px-0">
                    <button class="btn btn-danger shadow-none open-sans plus" data-name="{{ coffee-name }}" data-coffee-type="{{ coffee-type }}" data-available="{{ available }}" data-price="{{ price }}" data-index="{{ index }}" data-main-index="{{ mainIndex }}"><i class="fa-solid fa-plus"></i></button>
                </div>
            </td>
        </tr>
    `;

    this.totalTemplate = `Total Cost: <strong class="ms-2">&#8369;{{ total }}</strong>`;

    // encapsulation
    this.setServiceBtn = () => {
        this.reset();

        this.serviceBtn.on('click', event => {
            if(this.total != 0) {
                console.log(event.currentTarget.dataset.service);
                
                this.map.forEach((value, key) => {
                    console.log('key: ', key, 'value: ', value);
                });
            } else event.preventDefault();
        });

        return this;
    };

    this.displayAmount = map => {
        this.reset();
        this.map = map;
        this.map.forEach((value, key) => { this.total += value.quantity * value.price; });
        this.amount.html(this.totalTemplate.replace('{{ total }}', this.total.toFixed(2)));
    };

    this.reset = () => { this.total = 0 };
    this.getTable = () => { return this.table };
    this.getRowHeader = () => { return this.coffeeRowHeader };
    this.getRow = () => { return this.coffeeRow };

}
