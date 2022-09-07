@extends('layouts.master')
<body>
    
    @section('main-content')

    <!-- Content Fixed -->
    <div class="row">

        <!-- Feedback Left -->
        <div class="d-flex align-items-center login-fixed p-4 col-4">
            <div class="header container">
                <div class="d-flex flex-column align-items-center text-start">
                    <h2 class="kaushan-script mt-5 mb-4 pt-0 w-100">Coffee Shop</h2>
                    <p class="open-sans mt-4 mb-5 pt-2 login-description">Login for drinks delivery and employee service. Enjoy using our application &#128513;<br/>

                        @if ($errors->any())

                            @foreach ($errors->all() as $error)
                                <br/><strong class="text-danger">{{ $error }}</strong>
                            @endforeach

                        @endif

                    </p>
                </div>
                <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-control m-0 p-0">
                    <label class="d-block roboto" for="username">Username</label>
                    <input required class="roboto mt-1 p-1 w-75" type="text" placeholder="enter username" name="username">
                </div>
                <div class="form-control m-0 p-0 mt-3">
                    <label class="d-block roboto" for="password">Password</label>
                    <input required class="roboto mt-1 p-1 mb-4 w-75" type="password" name="password" autocomplete="current-password">
                </div>
                <button class="btn btn-light login-btn shadow-none px-4 py-1 roboto" type="submit">Login</button>
                <button class="btn btn-secondary register-btn text-light shadow-none px-4 py-1 roboto" type="button">Register</button>
                
                </form>
                <div class="feedback-left mt-5"></div>
            </div>
        </div>

        <!-- Feedback Right -->
        <div class="register-fixed pt-5 px-5 col-8">

            <form action="{{ route('register') }}" method="POST">
            @csrf

            <!-- Personal Information -->
            <div class="register-header container mt-5 pt-3 pb-4 bg-primary text-center">
                <button class="text-light close-btn m-3" type="button"><i class="fa-solid fa-circle-xmark"></i></button>
                <object class="my-5" data="{{ asset('svg/personal.svg') }}"></object>
                <h3 class="text-light open-sans">Your Personal Information</h3>
                <p class="text-secondary open-sans px-5">Fill-up all the necessary for delivery information purposes.</p>
            </div>
            <div class="register-content px-5 py-4">
                <div class="row">
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="first_name">First Name <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="text" name="first_name">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="last_name">Last Name <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="text" name="last_name">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="username">Username <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="text" name="username">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="age">Age <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="number" name="age">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Information -->
            <div class="register-header container mt-0 pt-3 pb-4 bg-primary text-center">
                <object class="my-5" data="{{ asset('svg/address.svg') }}"></object>
                <h3 class="text-light open-sans">Your Personal Address</h3>
                <p class="text-secondary open-sans px-5">Fill-up all the necessary to determine your exact location for delivery services.</p>
            </div>
            <div class="register-content px-5 py-4">
                <div class="row">
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="street_no">Street# <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="text" name="street_no">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="street">Street <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="text" name="street">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="barangay">Barangay / Village <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="text" name="barangay">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="city">City <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="text" name="city">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="province">Province <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="text" name="province">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="zip_code">Zip Code <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="text" name="zip_code">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Information -->
            <div class="register-header container mt-0 pt-3 pb-4 bg-primary text-center">
                <object class="my-5" data="{{ asset('svg/security.svg') }}"></object>
                <h3 class="text-light open-sans">Strengthen the Security</h3>
                <p class="text-secondary open-sans px-5">Improve your password especially for those employees who will manage the all the drink items.</p>
            </div>
            <div class="register-content px-5 py-4">
                <div class="row">
                    <div class="col-12 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="email">Email <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="email" name="email">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="password">Password <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="password" name="password">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="form-control m-0 p-3">
                            <label class="d-block w-100 roboto" for="password_confirmation">Confirm Password <strong class="text-danger">*</strong></label>
                            <input required class="w-100 mt-1" type="password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="col-12 m-0 p-0">
                        <p class="roboto text-danger security-note"><strong>Note: </strong>password should be 8 or more characters.</p>
                    </div>
                    <div class="col-12 m-0 p-0 mt-3 text-end">
                        <button class="btn btn-primary roboto" type="submit" id="employee-btn">Confirm as Employee</button>
                        <button class="btn btn-primary roboto" type="submit" id="costumer-btn">Confirm as Costumer</button>
                    </div>
                </div>
            </div>

            <footer class="w-100 bg-primary"></footer>

            </form>

        </div>

        <div class="register-card card col-8 m-0 p-0">
            <img src="{{ asset('images/items/jpg/background-login.jpg') }}" class="card-img-top" alt="...">
            <div class="cover w-100 h-100"></div>
            <div class="card-body bg-light w-100 h-100 my-5 py-5 px-5 text-center">
                <h5 class="card-title text-white mt-5 mb-3 roboto">Feedback</h5>
                <p class="card-text text-white roboto px-5 mb-4">Information about reactions to a product, a person's performance of a task, etc. which is used as a basis for improvement.</p>
                <div class="row">
                    <!-- Column 1 --><div class="col-4 p-2 feedback-column"></div>
                    <!-- Column 2 --><div class="col-4 p-2 feedback-column"></div>
                    <!-- Column 3 --><div class="col-4 p-2 feedback-column"></div>
                </div>

                <!-- Extra Space -->
                <div class="my-5"></div>
            </div>
        </div>
    </div>
        
    @endsection

    <script> 
        let feedbacks = [
            @foreach ($feedbacks as $feedback)
                {
                    username: '{{ $feedback->user->username }}',
                    rate: '{{ $feedback->rate }}',
                    description: '{{ $feedback->comment }}'
                },
            @endforeach
        ];
    </script>
</body>
</html>

{{--
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}
