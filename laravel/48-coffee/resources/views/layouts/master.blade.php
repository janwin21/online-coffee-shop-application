{{-- head --}}
@include('layouts.head')

{{-- navigation --}}
@include('layouts.nav')

{{-- main-content --}}
@yield('main-content')

{{-- footer --}}
@unless (Request::is('login') || Request::is('dashboard'))
    @include('layouts.footer')
@endunless