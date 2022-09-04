// Coffee Order Model
"use strict";

export default function CoffeeOrder(settings, parent) {
    this.settings = settings;
    this.parent = parent;
    this.map = new Map();

    // templates
    this.template = `<!-- Second Card Collection Design -->
        <div class="col-sm-6 col-md-3 col-lg-2 m-0 p-2">
            <div class="card card-coffee-item" data-name="{{ coffee-name }}" data-coffee-type="{{ coffee-type }}" data-available="{{ available }}" data-price="{{ price }}" data-index="{{ index }}" data-main-index="{{ mainIndex }}">
                <img class="card-img-top w-100 h-100" src="../images/coffee/{{ coffee-name-img }}.jpg" alt="...">
                <div class="cover w-100 h-100">
                    <i class="text-secondary fa-solid fa-plus"></i>
                    <p class="text-light roboto w-100 text-center px-2">{{ coffee-name }}</p>
                </div>
            </div>
        </div>
    `;

    this.description = `<!-- Description Format -->
        <div class="card">
            <img class="card-img-top w-100 h-100" src="../images/coffee/{{ coffee-name-img }}.jpg" alt="...">
            <div class="main-cover w-100 h-100 p-4">
                <button class="btn btn-primary m-3 shadow-none" data-name="{{ coffee-name }}" data-coffee-type="{{ coffee-type }}" data-available="{{ available }}" data-price="{{ price }}" data-index="{{ index }}" data-main-index="{{ mainIndex }}"><i class="text-light fa-solid fa-plus"></i></button>
                <h3 class="card-title text-secondary roboto">{{ coffee-name }}</h3>
                <p class="card-text text-light open-sans">Available Stack: <strong id="available">{{ available }}</strong></p>
                <h2 class="text-secondary open-sans mx-4 my-3"><strong class="me-1">&#8369;</strong>{{ price }}</h2>
            </div>
        </div>
    `;

    this.container = `
        <h1 class="coffee-shop-type open-sans roboto bg-dark text-light w-50 px-5 py-2" id="{{ coffee-type-id }}">{{ coffee-type }}</h1>

        <div class="coffee-item-collection mx-0 my-4 row">
            <!-- First Card Description Design -->
            <div class="coffee-shop-description col-sm-6 col-md-6 col-lg-4 m-0 p-2">{{ description }}</div>
            {{ item-collection }}
        </div>
    `;

    // encapsulation
    this.setDetails = () => {

        let containerText = '';

        this.settings.forEach((setting, mainIndex) => {
            let coffeeItemText = '', descriptionText = '';

            setting.data.forEach((d, index) => {
                coffeeItemText += this.template
                                    .replace('{{ coffee-name-img }}', d.name.replaceAll(' ', '-'))
                                    .replace('{{ available }}', d.available)
                                    .replace('{{ price }}', parseFloat(d.price).toFixed(2))
                                    .replace('{{ mainIndex }}', mainIndex)
                                    .replace('{{ index }}', index)
                                    .replace('{{ coffee-type }}', setting.coffeeType)
                                    .replaceAll('{{ coffee-name }}', d.name);

                // set the description box at the first index values
                if(index == setting.selectedIndex) descriptionText += this.description
                                                      .replaceAll('{{ coffee-name }}', d.name)
                                                      .replace('{{ coffee-name-img }}', d.name
                                                           .replaceAll(' ', '-'))
                                                      .replaceAll('{{ available }}', d.available)
                                                      .replaceAll('{{ price }}', parseFloat(d.price).toFixed(2))
                                                      .replace('{{ mainIndex }}', mainIndex)
                                                      .replace('{{ index }}', index)
                                                      .replace('{{ coffee-type }}', setting.coffeeType);  
            });

            containerText += this.container
                                .replace('{{ item-collection }}', coffeeItemText)
                                .replace('{{ coffee-type-id }}', setting.coffeeType.replace(' ', '-'))
                                .replaceAll('{{ coffee-type }}', setting.coffeeType)
                                .replace('{{ description }}', descriptionText);

        });

        this.parent.html(containerText);
        this.descriptiveComponent = $('.coffee-shop-description');
        this.descriptiveComponent.find('button').on('click', event => { this.addItem(event, true) })
        if(this.cssSelector !== undefined) this.setEvent(this.cssSelector);

        return this;
    };

    this.setEvent = cssSelector => {
        this.cssSelector = cssSelector;
        $(this.cssSelector).on('click', event => { this.setDescription(event.currentTarget); });
        return this;
    }

    this.setDescription = currentTarget => {
        $(this.descriptiveComponent[currentTarget.dataset.mainIndex]).html(
            this.description.replaceAll('{{ coffee-name }}', currentTarget.dataset.name)
                            .replace('{{ coffee-name-img }}', currentTarget.dataset.name.replaceAll(' ', '-'))
                            .replace('{{ mainIndex }}', currentTarget.dataset.mainIndex)
                            .replace('{{ index }}', currentTarget.dataset.index)
                            .replaceAll('{{ available }}', currentTarget.dataset.available)
                            .replaceAll('{{ price }}', currentTarget.dataset.price)
                            .replace('{{ coffee-type }}', currentTarget.dataset.coffeeType)
        );
        this.descriptiveComponent.find('button').on('click', event => { this.addItem(event, true) });
    };

    this.getDescriptiveComponent = () => { return this.descriptiveComponent; }
    this.getIndex = () => { return this.index };
    this.getAvailable = () => { return this.available };

    // connect this Coffee Header to Coffee Order model
    this.addCoffeeHeader = coffeeHeader => { this.coffeeHeader = coffeeHeader; return this; };

    // connect this Coffee Table to Coffee Order model
    this.addCoffeeTable = coffeeTable => { this.coffeeTable = coffeeTable; return this; };

    this.addItem = (event, isIncrement, remainingQuantity) => {
        let setting = this.settings[event.currentTarget.dataset.mainIndex];
        let data = setting.data[event.currentTarget.dataset.index];
        setting.selectedIndex = event.currentTarget.dataset.index;

        let name = event.currentTarget.dataset.name;
        let notAvailable = data.available <= 0;

        if(!notAvailable || $(event.currentTarget).hasClass('minus')) {
            let value = isIncrement ? 1 : (remainingQuantity !== undefined) ? -remainingQuantity : -1;
            let available = data.available - value;
            let row = '';

            // decrease available stacks in the element
            event.currentTarget.dataset.available = available;

            // decrease available stacks in the array
            data.available = available;

            $('#available').html(available);

            this.map.set(name, {
                quantity: (this.map.get(name) !== undefined) ? this.map.get(name).quantity + value: 1,
                coffeeType: event.currentTarget.dataset.coffeeType,
                price: event.currentTarget.dataset.price,
                available: available,
                mainIndex: event.currentTarget.dataset.mainIndex,
                index: event.currentTarget.dataset.index
            });

            // automatically delete if the quantity is 0 from the table
            if(this.map.get(name).quantity <= 0) this.map.delete(name);

            this.secureDelete(this.map); // secure if the map size really decrease

            this.map.forEach((value, key) => {
                row += this.coffeeTable.getRow()
                        .replaceAll('{{ coffee-name }}', key)
                        .replaceAll('{{ coffee-type }}', value.coffeeType)
                        .replace('{{ quantity }}', value.quantity)
                        .replaceAll('{{ price }}', parseFloat(value.price).toFixed(2))
                        .replace('{{ amount }}', (value.price * value.quantity).toFixed(2))
                        .replaceAll('{{ available }}', value.available)
                        .replaceAll('{{ index }}', value.index)
                        .replaceAll('{{ mainIndex }}', value.mainIndex)
            });

            if(this.map.size != 0) { 
                this.coffeeTable.getTable().html(this.coffeeTable.getRowHeader() + row);
                this.setDetails();

                // set events
                $('.buy-delete').on('click', event => { this.deleteItem(event); }); // DELETE
                $('.plus').on('click', event => { this.addItem(event, true); }); // ADD
                $('.minus').on('click', event => { this.addItem(event, false); }); // SUBTRACT
            } else this.coffeeTable.getTable().html('');

            // display the total value
            this.coffeeTable.displayAmount(this.map);
            this.coffeeHeader.setSettings(this.settings);
        }
    };

    this.deleteItem = event => {
        let name = event.currentTarget.dataset.name;
        let quantity = this.map.get(name).quantity;

        this.map.delete(name);
        this.addItem(event, false, quantity);
    };

    this.secureDelete = map => {
        map.forEach((value, key) => {
            if(value.coffeeType === undefined) map.delete(key);
        });
    };

}
