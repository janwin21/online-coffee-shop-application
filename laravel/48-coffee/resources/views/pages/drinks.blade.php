@extends('layouts.master')
<body>
    
    @section('main-content')

    <!-- Coffee Header Display -->
    <header class="coffee-header container-fluid bg-primary p-0 pt-5">
        <div class="container">
            <div class="card m-0">
                <img class="card-img-top w-100 h-100" src="{{ asset('images/coffee/affogato.jpg') }}" alt="...">
                <div class="cover w-100 h-100"></div>
                <!-- Description of the Product -->
                <div class="card-body w-100">
                    <p class="card-text text-secondary ms-4 mt-0 mb-5 w-25 open-sans deletable">Mini sentence for coffee title introduction</p>
                    <h1 class="card-title text-success kaushan-script ms-4 my-0">Coffee name</h1>
                    <p class="card-text text-light ms-4 mt-3 w-50 open-sans">(Description) Some quick example text to build on the card title and make up the bulk of the card's content</p>
                    <a href="#" class="btn btn-info shadow-none m-4 px-4 open-sans">Visit Drinks</a>
                </div>
                <!-- Price Description of the Product -->
                <div class="coffee-description pe-4 h-100">
                    <p class="card-text text-light me-4 mt-5 mb-0 w-100 text-end open-sans">Coffee Type</p>
                    <p class="card-text text-secondary me-4 mt-0 w-100 text-end open-sans"><strong>10</strong> Available Stack</p>
                    <p class="card-text text-secondary me-4 mt-5 mb-0 w-100 text-end open-sans">Price</p>
                    <h1 class="card-text text-light mt-0 w-100 text-end open-sans"><strong class="me-1">&#8369;</strong>89.99</h1>
                </div>
                <!-- Animated Cover -->
                <div class="animated-cover w-100 h-100"></div>
            </div>
        </div>
    </header>

    <!-- Coffee Shop Display -->
    <div class="coffee-shop container my-5"></div>

    <!-- Cart Button Display -->
    <a class="cart-btn btn btn-info open-sans shadow-none px-5 m-3" href="#coffee-buy-display">
        <i class="fa-solid fa-bag-shopping me-2"></i>Drinks Cart
    </a>

    <!-- Buy Display -->
    <div class="coffee-buy container-fluid p-0" id="coffee-buy-display">
        <div class="container text-center">
            <object class="my-5" data="{{ asset('svg/drink-cart.svg') }}"></object>
            <h4 class="px-5 text-light">BUY A DRINKS</h4>    
            <p class="open-sans text-light py-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, consequatur molestiae! Rem recusandae porro nostrum, optio illo dolorem fugiat nobis corrupti culpa fugit iste vel adipisci quibusdam distinctio blanditiis sapiente.</p>
        </div>
    </div>

    <form action="{{ route('drinks.store') }}" method="POST">
    @csrf

    <!-- Short Form -->
    <div class="short-form container mt-5">
        <div class="row">
            <div class="col-4"><div class="form-control">
                <label class="text-dark mb-2" for="surname">Surname <strong>*</strong></label>
                <input class="d-block w-100 px-2 py-1" type="text" name="surname" placeholder="surname..." required>
            </div></div>
            <div class="col-2"><div class="form-control">
                <label class="text-dark mb-2" for="table-number">Table # <strong>*</strong></label>
                <input class="d-block w-100 px-2 py-1" type="number" name="table_number" min="1" required>
            </div></div>
            <div class="col-6">
                <p class="text-dark d-hidden-p">.</p>
                <p class="text-dark">Select any table # if <strong>take out</strong>...</p>
            </div>
        </div>
    </div>
    
    <!-- Buy Display Table -->
    <div class="coffee-buy-table container p-0 my-5">
        <!-- Table -->
        <table class="container"></table>

        <!-- Buy Display Confirmation -->
        <div class="container buy-drinks mt-5">
            <div class="">
                <p class="roboto" id="amount">Total Cost: <strong class="ms-2">&#8369;0</strong></p>
                <!-- Main Inputs -->
                <input class="d-none" id="table-size" type="number" name="row_size">
                <input class="d-none" id="table-service" type="text" name="service_type">
                <input class="d-none" id="col-names" type="text" name="coffee_names">
                <input class="d-none" id="col-types" type="text" name="coffee_types">
                <input class="d-none" id="col-quantities" type="text" name="coffee_quantities">
            </div>
            <div class="buy w-100 d-flex justify-content-end mt-5">
                <p class="text-dark d-flex align-items-center h-100 open-sans note">Once click, your order will proceed to process</p>
                <!-- create a routes to determine if it is take-out or dine-in -->
                <button type="submit" class="btn btn-primary take-out shadow-none px-4 ms-4 open-sans" data-service="take out">Take out</button>
                <button type="submit" class="btn btn-primary dine-in shadow-none px-4 ms-2 open-sans" data-service="dine in">Dine in</button>
            </div>
        </div>
    </div>

    </form>
        
    @endsection

    <script>
        // drink js
        const settings = [
            {
                coffeeType: 'hot coffee',
                selectedIndex: 0,
                data: [
                    { 
                        name: 'cuban coffee',
                        mini: 'Type of espresso that originated in Cuba...',
                        description: 'A sweet espresso drink made with strong, dark roast espresso sweetened with a thick sugar foam. It\'s the most delicious coffee beverage of all time!',
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
                        mini: 'A temperature of 150 degrees Fahrenheit is perfect!',
                        description: 'That\'s where the milk is hot to the touch but not simmering. Then froth using your desired method to froth the milk until it\'s very foamy.',
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
                        mini: 'The traditional maple pecan latte uses espresso',
                        description: 'Like the sweet aroma of Autumn, the latte is a warm blend of coffee and steamed milk with notes of maple and pecan topped with whipped cream and more pecans.',
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
    </script>
</body>
</html>