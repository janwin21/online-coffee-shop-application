<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light px-0 py-2 sticky-top">
    <div class="container">

        <!-- Navbar Brand -->
        <a class="navbar-brand kaushan-script" href="#">48 Coffee</a>

        <!-- Navbar Nav -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-end">
            <li class="nav-item"><a class="nav-link open-sans ms-2 {{ Request::is('/') ? 'active' : '' }}" href="{{ route('page.home') }}">
                Home
            </a></li>
            <li class="nav-item"><a class="nav-link open-sans ms-2 {{ Request::is('drinks/create') ? 'active' : '' }}" href="{{ route('drinks.create') }}">
                Drinks
            </a></li>

            @if(Request::is('/'))
                <li class="nav-item"><a class="nav-link open-sans ms-2" href="#benefits">
                    Benefits
                </a></li>
                <li class="nav-item"><a class="nav-link open-sans ms-2" href="#coffee-detail">
                    Restaurants
                </a></li>
            @endif
            
            <li class="nav-item"><a class="nav-link open-sans ms-2" href="{{ route('drinks.index') }}">
                Queue
            </a></li>
            <li class="nav-item"><a class="nav-link open-sans ms-2" href="./about.html">
                About Us
            </a></li>
            <li class="nav-item"><a class="nav-link open-sans ms-2" href="#">
                <strong>Login</strong>
            </a></li>
        </ul>
    </div>
</nav>