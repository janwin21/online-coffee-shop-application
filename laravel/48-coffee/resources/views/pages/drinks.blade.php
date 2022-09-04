<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>48 Coffee Shop</title>

    <!-- Google Fonts Connect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- List of Font Families -->
    <!-- 'Open Sans', sans-serif -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- 'Kaushan Script', cursive -->
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <!-- 'Roboto', sans-serif -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- VITE -->
    @vite([
        'resources/scss/style.scss', 'resources/scss/fontawesome.scss',
        'resources/js/app.js', 'resources/js/pages/drinks.js'
    ])
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-0 py-2 sticky-top">
        <div class="container">

            <!-- Navbar Brand -->
            <a class="navbar-brand kaushan-script" href="#">48 Coffee</a>

            <!-- Navbar Nav -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-end">
                <li class="nav-item"><a class="nav-link open-sans ms-2" aria-current="page" href="#">
                    Home
                </a></li>
                <li class="nav-item"><a class="nav-link open-sans ms-2 active" href="./drinks.html">
                    Drinks
                </a></li>
                <li class="nav-item"><a class="nav-link open-sans ms-2" href="./costumers.html">
                    Queue
                </a></li>
                <li class="nav-item"><a class="nav-link open-sans ms-2" href="./about.html">
                    About Us
                </a></li>
                <li class="nav-item login"><a class="nav-link open-sans ms-2" href="#">
                    <strong>Login</strong>
                </a></li>
            </ul>
        </div>
    </nav>

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
    <div class="coffee-shop container my-5">
        <!-- 
        <h1 class="coffee-shop-type open-sans roboto bg-dark text-light w-50 px-5 py-2">Coffee Type 1</h1>

        <div class="coffee-item-collection mx-0 my-4 row">
            
            <div class="coffee-shop-description col-sm-6 col-md-6 col-lg-4 m-0 p-2">
                <div class="card">
                    <img class="card-img-top w-100 h-100" src="../images/coffee/affogato.jpg" alt="...">
                    <div class="main-cover w-100 h-100 p-4">
                        <button class="btn btn-primary m-3 shadow-none"><i class="text-light fa-solid fa-plus"></i></button>
                        <h3 class="card-title text-secondary roboto">Coffee Name</h3>
                        <p class="card-text text-light open-sans">Available Stack: <strong>10</strong></p>
                        <h2 class="text-secondary open-sans mx-4 my-3"><strong class="me-1">&#8369;</strong>89.99</h2>
                    </div>
                </div>
            </div>
            
        </div>
        -->
    </div>

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

    <form action="#">

    <!-- Short Form -->
    <div class="short-form container mt-5">
        <div class="row">
            <div class="col-4"><div class="form-control">
                <label class="text-dark mb-2" for="surname">Surname <strong>*</strong></label>
                <input class="d-block w-100 px-2 py-1" type="text" name="surname" placeholder="surname..." required>
            </div></div>
            <div class="col-2"><div class="form-control">
                <label class="text-dark mb-2" for="table-number">Table # <strong>*</strong></label>
                <input class="d-block w-100 px-2 py-1" type="number" name="table-number" min="1" required>
            </div></div>
        </div>
    </div>
    
    <!-- Buy Display Table -->
    <div class="coffee-buy-table container p-0 my-5">
        <!-- Table -->
        <table class="container">
            <!--
            <tr class="row px-4 mb-3">
                <th class="col open-sans text-light d-flex align-items-center">Drinks</th>
                <th class="col open-sans text-light d-flex align-items-center deletable">Type</th>
                <th class="col open-sans text-light d-flex align-items-center">Quantity</th>
                <th class="col open-sans text-light d-flex align-items-center deletable">Price</th>
                <th class="col open-sans text-light d-flex align-items-center">Total</th>
                <th class="col open-sans text-light d-flex align-items-center"></th>
            </tr>
            <tr class="row px-4 my-0">
                <td class="col open-sans d-flex align-items-center px-2 mx-0">
                    <input type="text" name="coffee-name" value="coffee name" disabled>
                </td>
                <td class="col open-sans d-flex align-items-center px-2 mx-0 deletable">
                    <input type="text" name="coffee-type" value="coffee type 1" disabled>
                </td>
                <td class="col open-sans d-flex align-items-center px-2 mx-0">
                    <input type="text" name="quantity" value="2" disabled>
                </td>
                <td class="col open-sans d-flex align-items-center px-2 mx-0 deletable">&#8369;89.99</td>
                <td class="col open-sans d-flex align-items-center px-2 mx-0">&#8369;89.99 * 2</td>
                <td class="col open-sans row d-flex align-items-center px-2 mx-0">
                    <div class="col-md-12 col-xl-6 px-0">
                        <button class="btn btn-danger shadow-none open-sans buy-delete">Delete</button>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3 px-0">
                        <button class="btn btn-danger shadow-none open-sans minus"><i class="fa-solid fa-minus"></i></button>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3 px-0">
                        <button class="btn btn-danger shadow-none open-sans plus"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </td>
            </tr>
            -->
        </table>

        <!-- Buy Display Confirmation -->
        <div class="container buy-drinks mt-5">
            <div class="">
                <p class="roboto" id="amount">Total Cost: <strong class="ms-2">&#8369;0</strong></p>
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

    <!-- Footer -->
    <footer class="container-fluid bg-primary">
        <div class="container pt-4 pb-5">
            <div class="text-center py-2"><h5>
                    <i class="fa-solid fa-mug-saucer me-4"></i>
                    48 Coffee Shop
                    <i class="fa-solid fa-mug-saucer ms-4"></i>
            </h5></div>
            <div class="row mt-3 pt-4 first">
                <div class="col-lg-4 pe-5">
                    <h5 class="mb-4"><i class="fa-solid fa-user-graduate me-3"></i>For Education</h5>
                    <p class="lato">Education, freedom and knowledge. These are the pillars for higher learning, but have often been used to describe some open source projects and services that have the potential to be abused by those that are not so innocent. Over the last two years, tools like stressers, Remote Administration Tools (RAT) and ransomware have been published under these pretenses, but do they serve a legitimate purpose?</p>

                    <h5 class="mb-4"><i class="fa-solid fa-tv mt-5 me-3"></i>CITE 006 - CS31S1</h5>
                    <p class="lato">Emerging technologies are technologies whose development, practical applications, or both are still largely unrealized. These technologies are generally new but also include older technologies finding new applications. Emerging technologies are often perceived as capable of changing the status quo.</p>
                </div>
                <div class="col-lg-4 pe-5">
                    <h5 class="mb-4"><i class="fa-solid fa-cat me-3"></i>Categories</h5>
                    <ul>
                        <li><p class="m-0 p-0">Coffee</p></li>
                        <li><p class="m-0 p-0">Soda</p></li>
                        <li><p class="m-0 p-0">Tea</p></li>
                        <li><p class="m-0 p-0">Restaurant</p></li>
                        <li><p class="m-0 p-0">Location</p></li>
                        <li><p class="m-0 p-0">Delivery</p></li>
                        <li><p class="m-0 p-0">Payment</p></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="mb-4"><i class="fa-solid fa-newspaper me-3"></i>Content</h5>
                    <ul>
                        <li><p class="m-0 p-0">Drinks</p></li>
                        <li><p class="m-0 p-0">Restaurant & Settings</p></li>
                        <li><p class="m-0 p-0">Coffee</p></li>
                        <li><p class="m-0 p-0">Tea</p></li>
                        <li><p class="m-0 p-0">Soda</p></li>
                    </ul>
                    <h5 class="my-4"><i class="fa-solid fa-tags mt-4 me-3"></i>Tags</h5>
                    <ul class="d-flex flex-row flex-wrap p-0 m-0">
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1">HTML</p></li>
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1">CSS</p></li>
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1">JavaScript</p></li>
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1"><i class="fa-solid fa-star me-2"></i>JQuery</p></li>
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1"><i class="fa-solid fa-star me-2"></i>Bootstrap</p></li>
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1">Node JS</p></li>
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1"><i class="fa-solid fa-star me-2"></i>SASS</p></li>
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1">Fontawesome</p></li>
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1">Google Fonts</p></li>
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1">unDraw</p></li>
                        <li class="me-1"><p class="alert alert-secondary text-light m-0 px-2 py-1"><i class="fa-solid fa-star me-2"></i>Laravel</p></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <object class="mt-2" data="{{ asset('svg/powered.svg') }}"></object>
            <h5 class="pb-4 pt-2 mt-5 open-sans">Powered By:</h5>
            <div class="row mb-5">
                <div class="powered col">
                    <i class="fa-brands fa-js-square"></i>
                </div>
                <div class="powered col">
                    <i class="fa-brands fa-bootstrap"></i>
                </div>
                <div class="powered col">
                    <i class="fa-brands fa-sass"></i>
                </div>
                <div class="powered col">
                    <i class="fa-brands fa-laravel"></i>
                </div>
                <div class="powered col">
                    <i class="fa-solid fa-database"></i>
                </div>
                <div class="powered col">
                    <i class="fa-solid fa-font-awesome"></i>
                </div>
            </div>
        </div>
        <div class="copyright container">
            <div class="row pt-4 pb-2">
                <div class="w-50">
                    <p><strong>&copy;</strong> 2022 <strong>48 Coffee Shop</strong>, developed by <strong>CS31S1 Coffee Group</strong></p>
                </div>
                <div class="w-50 d-flex flex-row justify-content-end align-items-start">
                    <i class="fa-brands fa-facebook me-2"></i>
                    <i class="fa-brands fa-twitter me-2"></i>
                    <i class="fa-brands fa-instagram me-2"></i>
                    <i class="fa-brands fa-google me-2"></i>
                    <i class="fa-brands fa-youtube me-2"></i>
                    <i class="fa-brands fa-github"></i>
                </div>
            </div>
        </div>
    </footer>

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