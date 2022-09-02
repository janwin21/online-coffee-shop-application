// Coffee Header Model
"use strict";

function CoffeeHeader(parent) {
    this.parent = parent;

    // templates
    this.cardBody = `<!-- Card Body Template -->
        <p class="card-text text-secondary ms-4 mt-0 mb-5 w-25 open-sans deletable">{{ mini }}</p>
        <h1 class="card-title text-success kaushan-script ms-4 my-0">{{ coffee-name }}</h1>
        <p class="card-text text-light ms-4 mt-3 w-50 open-sans">{{ description }}</p>
        <a href="#{{ coffee-type-id }}" class="btn btn-info shadow-none m-4 px-4 open-sans">Visit Drinks</a>
    `;
    
    this.coffeeDescription = `<!-- Coffee Description Template -->
        <p class="card-text text-light me-4 mt-5 mb-0 w-100 text-end open-sans">{{ coffee-type }}</p>
        <p class="card-text text-secondary me-4 mt-0 w-100 text-end open-sans"><strong>{{ available }}</strong> Available Stack</p>
        <p class="card-text text-secondary me-4 mt-5 mb-0 w-100 text-end open-sans">Price</p>
        <h1 class="card-text text-light mt-0 w-100 text-end open-sans"><strong class="me-1">&#8369;</strong>{{ price }}</h1>
    `;

    // encapsulation
    this.setAnimation = (milliseconds, interval) => {
        let cover = this.parent.find('.animated-cover');

        setInterval(() => {
            cover.fadeIn(milliseconds, () => {
                this.setDetails(++this.index);
                if(this.index + 1 >= this.clonedSettings.length) this.index = -1;
                cover.fadeOut(milliseconds)
            }); 
        }, interval);
    
        return this;
    };

    this.setSettings = settings => {
        this.settings = settings;
        this.clonedSettings = [];

        this.settings.forEach((item, index) => {
            item.data.forEach((d, i) => {
                if(d.mini !== undefined)
                    this.clonedSettings.push({...d, coffeeType: item.coffeeType});
            });
        });

        return this;
    };

    this.setDetails = index => {

        this.index = index;
        let item = this.clonedSettings[this.index];

        let cardBodyText = this.cardBody
                               .replace('{{ mini }}', item.mini)
                               .replace('{{ coffee-name }}', item.name)
                               .replace('{{ description }}', item.description)
                               .replace('{{ coffee-type-id }}', item.coffeeType.replace(' ', '-'));

        let coffeeDescriptionText = this.coffeeDescription
                                        .replace('{{ coffee-type }}', item.coffeeType)
                                        .replace('{{ available }}', item.available)
                                        .replace('{{ price }}', parseFloat(item.price).toFixed(2));

        this.parent.find('.card-body').html(cardBodyText);
        this.parent.find('.coffee-description').html(coffeeDescriptionText);

        return this;
    };

}