<!DOCTYPE html>
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

    <!-- VITE -->
    @vite([
        'resources/scss/style.scss', 'resources/scss/fontawesome.scss',
        'resources/js/app.js',
        Request::is('/') ? 'resources/js/pages/home.js' :
        (Request::is('drinks/create') ? 'resources/js/pages/drinks.js' : 
        (Request::is('drinks') ? 'resources/js/pages/queue.js' :
        (Request::is('login') ? 'resources/js/pages/authentication.js' :
        (Request::is('dashboard') ? 'resources/js/pages/dashboard.js' : ''))))
    ])
</head>