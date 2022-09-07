// Coffee Header Model
"use strict";

export default function CoffeeHeader(parent) {
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
            if(!this.empty) 
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
                if(d.mini.length != 0 && d.description.length != 0)
                    this.clonedSettings.push({...d, coffeeType: item.coffeeType});
            });
        });

        return this;
    };

    this.setDetails = index => {
        
        this.index = index;
        this.empty = this.clonedSettings.length <= 1;
    
        let item = this.clonedSettings[this.index];
        const hasOne = this.clonedSettings.length == 1;

        const mini = 'Take a sip for a while...';
        const name = '48 Coffee';
        const description = 'Olé! Life is good when it starts with a great cup of coffee. Love is brewing the perfect cup of coffee, one sip at a time.';
        const home = '';
        const coffee_type = 'Hello!';
        const available = 'Not';
        const price = '0.00';

        let cardBodyText = this.cardBody
                               .replace('{{ mini }}', (!this.empty || hasOne) ? item.mini : mini)
                               .replace('{{ coffee-name }}', (!this.empty || hasOne) ? item.name : name)
                               .replace('{{ description }}', (!this.empty || hasOne) ? item.description : description)
                               .replace('{{ coffee-type-id }}', (!this.empty || hasOne) ? item.coffeeType.replace(' ', '-') : home);

        let coffeeDescriptionText = this.coffeeDescription
                                        .replace('{{ coffee-type }}', (!this.empty || hasOne) ? item.coffeeType : coffee_type)
                                        .replace('{{ available }}', (!this.empty || hasOne) ? item.available : available)
                                        .replace('{{ price }}', (!this.empty || hasOne) ? parseFloat(item.price).toFixed(2) : price);

        this.parent.find('.card-img-top').attr('src', `../images/saveCoffees/${item.image_path}`);
        this.parent.find('.card-body').html(cardBodyText);
        this.parent.find('.coffee-description').html(coffeeDescriptionText);

        return this;
    };

}