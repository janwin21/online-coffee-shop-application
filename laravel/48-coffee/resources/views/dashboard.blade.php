@extends('layouts.master')
<body>

    @section('main-content')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-2"></div>
            <div class="col-2 dashboard-sidebar bg-primary pt-5 fixed-top">

                @if (Auth::user()->hired == 1)
                
                <p class="bb m-0 p-0 mt-4"><span class="badge bg-light w-100 p-3 mt-1 text-start roboto">Types of Drink</span></p>
                <p class="m-0 p-0"><span class="badge type-box bg-light w-100 p-3 text-start roboto">Drink Types Name</span></p>

                <!-- Edit Coffee Type -->
                <div class="edit-type-box p-3">

                    <form action="{{ route('coffee-type.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-8"><p class="text-light open-sans">Add type of drink</p></div>
                        <div class="col-4"><button type="submit" class="btn btn-primary open-sans shadow-none"><i class="fa-solid fa-plus"></i></button></div>
                        <div class="col-12 mt-3">
                            <div class="form-control px-0 mb-2">
                                <label class="roboto mb-2" for="coffee_type">Drink Type<strong class="ms-1 text-danger">*</strong></label>
                                <input required class="roboto pb-1" type="text" name="coffee_type" placeholder="type here...">
                            </div>
                            <div class="form-control px-0">
                                <div class="row">
                                    <label class="col-6 roboto mb-2 me-3" for="bg_color">BG Color</label>
                                    <input required class="col-4" type="color" name="bg_color" value="#90604C">
                                </div>
                            </div>
                            <div class="form-control px-0">
                                <div class="row">
                                    <label class="col-6 roboto mb-2 me-3" for="font_color">Font Color</label>
                                    <input required class="col-4" type="color" name="font_color" value="#E9E6E1">
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>

                </div>

                <!-- Edit New Coffee -->
                <div class="edit-coffee-box mt-3">

                    <form action="{{ route('coffee.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title text-light">Add New Drinks</h5>
                                <p class="card-text text-light">Create your new drinks base on the existing types of drinks.</p>

                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="roboto text-danger coffee-error"><strong>{{ $error }}</strong></p>
                                    @endforeach
                                @endif

                                <div class="form-control px-0 mb-2">
                                    <label class="roboto mb-2" for="coffee_name">Drinks Name<strong class="ms-1 text-danger">*</strong></label>
                                    <input required class="roboto pb-1" type="text" name="coffee_name" placeholder="type here...">
                                </div>
                                <div class="form-control px-0 mb-2">
                                    <label class="roboto mb-2" for="price">Price<strong class="ms-1 text-danger">*</strong></label>
                                    <input required class="roboto pb-1" type="number" step=".01" min="0" name="price" placeholder="type a number...">
                                </div>
                                <div class="form-control px-0 mb-2">
                                    <p class="text-light">Drinks Coffee Type<strong class="ms-1 text-danger">*</strong></p>

                                    @if ($coffee_types)
                                        @foreach ($coffee_types as $coffee_type)
                                            
                                            <input required type="radio" id="{{ $coffee_type->coffee_type }}" name="coffee_type_name" value="{{ $coffee_type->coffee_type }}">
                                            <label class="roboto ms-2" for="coffee_type_name">{{ $coffee_type->coffee_type }}</label><br>

                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-control px-0 mb-2">
                                    <label class="roboto mb-2" for="available">Available<strong class="ms-1 text-danger">*</strong></label>
                                    <input required class="roboto pb-1" type="number" min="0" name="available" placeholder="type a number...">
                                </div>
                                <div class="form-control px-0 mb-2">
                                    <label class="roboto mb-2" for="image">Picture<strong class="ms-1 text-danger">*</strong></label>
                                    <input required class="roboto pb-1 mt-3 w-100" type="file" name="image">
                                </div>
                                <div class="form-control px-0">
                                    <label class="roboto mb-2" for="short">Short Description</label>
                                    <textarea class="roboto pb-1 w-100" name="short" placeholder="type here..."></textarea>
                                </div>
                                <div class="form-control px-0">
                                    <label class="roboto mb-2" for="description">Description</label>
                                    <textarea class="roboto pb-1 w-100" name="description" placeholder="type here..."></textarea>
                                </div>
                                
                                <div class="col-4 float-end w-75 me-0 mt-2"><button type="submit" class="btn btn-primary open-sans shadow-none add-btn w-100">Add Drinks</button></div>
                            </div>
                        </div>

                    </form>

                </div>
                    
                @endif

                <!-- Feedback -->
                <div class="edit-feedback-box mt-3">

                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf

                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <object class="mt-3" data="{{ asset('svg/feedback.svg') }}"></object>
                                <h5 class="card-title text-light mb-3 mt-5"><strong>Feedback</strong></h5>
                                <p class="card-text text-light mb-5">The feedback you provided is displayed in the login page.</p>

                                <!-- Feedback Radio -->
                                <div class="form-control px-0 mb-2 text-start">
                                    <p class="text-light">Rate our website<strong class="ms-1 text-danger">*</strong></p>
                                    <!-- excellent -->
                                    <input required type="radio" id="excellent" name="rate" value="excellent">
                                    <label class="roboto ms-2" for="rate">excellent</label><br>
                                    <!-- well-done -->
                                    <input required type="radio" id="well-done" name="rate" value="well-done">
                                    <label class="roboto ms-2" for="rate">well-done</label><br>
                                    <!-- good -->
                                    <input required type="radio" id="good" name="rate" value="good">
                                    <label class="roboto ms-2" for="rate">good</label><br>
                                    <!-- its-ok -->
                                    <input required type="radio" id="its-ok" name="rate" value="its-ok">
                                    <label class="roboto ms-2" for="rate">its-ok</label><br>
                                    <!-- poor -->
                                    <input required type="radio" id="poor" name="rate" value="poor">
                                    <label class="roboto ms-2" for="rate">poor</label><br>
                                </div>

                                <!-- Feedback Textarea -->
                                <div class="form-control px-0 text-start">
                                    <label class="roboto mb-4" for="comment">What do you feel about our website?<strong class="ms-1 text-danger">*</strong></label>
                                    <textarea required class="roboto pb-1 w-100" name="comment" placeholder="type your comment here..."></textarea>
                                </div>
                                <div class="col-4 float-end w-75 me-0 mt-2"><button type="submit" class="btn btn-primary feedback-btn open-sans shadow-none add-btn w-100">Enter</button></div>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

            <!-- Main Content -->
            <div class="col-8 dashboard-content bg-dark p-4">
                <h1 class="roboto text-light mb-4">Dashboard</h1>

                <!-- Coffee Collections -->
                <div class="coffee-collection text-center p-5">
                    <object class="mb-3" data="{{ asset('svg/edit-drinks.svg') }}"></object>
                    <h3 class="text-light open-sans w-100 mt-4">Drink Items</h3>
                    <p class="text-light open-sans mb-5">Manage your coffee / drink items here. Don't forget to specify the type of the items for more specification.</p>
                    
                @if ($coffee_types)
                    @foreach ($coffee_types as $coffee_type)

                    <div class="card-album text-start px-4 mt-4" 
                        style="background-color: {{ $coffee_type->bg_color }} !important;" id="{{ str_replace(' ', '-', $coffee_type->coffee_type) }}">
                        
                        <div class="row pt-4 pb-3">
                            <div class="col-10"><h4 class="roboto text-light"
                                style="color: {{ $coffee_type->font_color }} !important;"

                                >{{ $coffee_type->coffee_type }}</h4></div>

                            @if (Auth::user()->hired == 1)

                            <!-- delete coffee type btn -->
                            <div class="col-2 text-end">
                                <button class="btn btn-danger delete-btn shadow-none"
                                data-name="{{ $coffee_type->coffee_type }}" 
                                data-url="{{ route('coffee-type.destroy', $coffee_type->id) }}">Delete</button>
                            </div>
                                
                            @endif
                        </div>

                        <div class="row">

                            <!-- Coffee -->

                            @foreach ($coffee_type->coffees as $coffee)

                            <div class="col-4 m-0 pb-4">
                                <div class="card">
                                    <img class="card-img-top h-100" src="{{ asset('images/saveCoffees/' . $coffee->image_path) }}" alt="...">
                                    <div class="cover w-100 h-100 p-2">

                                        @if (Auth::user()->hired == 1)

                                        <!-- modify coffee item -->
                                        <!--<button class="float-end shadow-none ms-1 px-2 py-1 btn btn-warning"><i class="fa-solid fa-pen"></i></button>-->
                                        <button class="float-end shadow-none m-0 px-2 py-1 btn btn-danger" data-name="coffee_name" data-url="{{ route('coffee.destroy', $coffee->id) }}"><i class="fa-solid fa-trash"></i></button>

                                        @endif
                                    </div>
                                    <div class="card-body w-100 h-50 p-2">
                                        <h5 class="card-title text-light">{{ $coffee->coffee_name }}</h5>
                                        <p class="card-text mb-0">Price: <strong class="text-light">&#8369;{{ $coffee->price }}</strong></p>
                                        <p class="card-text mt-0">Available: <strong class="text-light">{{ $coffee->available }} Stacks</strong></p>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach

                        </div>
                    </div>

                    @endforeach
                @endif

                </div>

                <!-- Collections -->
                <div class="two-tables py-5">
                    <div class="row">
                        <div class="col-6 text-center mt-4 px-5">
                            <object class="mb-3 table-obj-1" data="{{ asset('svg/colleague.svg') }}"></object>
                            <h3 class="text-light open-sans w-100 mt-4">Colleagues</h3>
                            <p class="text-light open-sans mb-5">You can read specific information about other employees from your branch.</p>

                            <table class="w-100">

                                @foreach ($users as $user)
                                    @if ($user->hired == 1)

                                    <tr>
                                        <td class="py-3 ps-4"><p class="text-light p-0 m-0">id#{{ $user->id }}</p></td>
                                        <td><p class="text-light p-0 m-0">{{ $user->username }}</p></td>
                                        <td><p class="text-light p-0 m-0">{{ $user->age }}</p></td>
                                        <td><p class="text-light p-0 m-0">{{ $user->city }}</p></td>
                                    </tr>
                                        
                                    @endif
                                @endforeach

                            </table>
                        </div>
                        <div class="col-6 text-center mt-4 px-5">
                            <object class="mb-3 table-obj-2" data="{{ asset('svg/costumer.svg') }}"></object>
                            <h3 class="text-light open-sans w-100 mt-4">Costumers</h3>
                            <p class="text-light open-sans mb-5">Check all clients that use this app for delivery service.</p>

                            <table class="w-100">

                                @foreach ($users as $user)
                                    @if ($user->hired == 0)

                                    <tr>
                                        <td class="py-3 ps-4"><p class="text-light p-0 m-0">id#{{ $user->id }}</p></td>
                                        <td><p class="text-light p-0 m-0">{{ $user->username }}</p></td>
                                        <td><p class="text-light p-0 m-0">{{ $user->age }}</p></td>
                                        <td><p class="text-light p-0 m-0">{{ $user->city }}</p></td>
                                    </tr>
                                        
                                    @endif
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Section -->
            <div class="col-2 dashboard-section bg-dark p-4 sticky-top">

                <div class="w-100 profile px-3 py-2">
                    <div class="row">
                        <div class="col-2"><h6 class="text-light"><i class="fa-solid fa-user"></i></h6></div>
                        <div class="col-10"><h6 class="text-light">{{ Auth::user()->username }}</h6></div>
                        <div class="col-2"><p class="text-light py-0 my-1"><i class="fa-solid fa-house"></i></p></div>
                        <div class="col-10"><p class="text-light py-0 my-1">{{ Auth::user()->city }}</p></div>
                        <div class="col-2"><p class="text-light py-0 my-1"><i class="fa-solid fa-screwdriver"></i></p></div>
                        <div class="col-10"><p class="text-light py-0 my-1">{{ (Auth::user()->hired == 1) ? 'employee' : 'costumer' }}</p></div>
                    </div>
                </div>

                <a href="#" class="btn btn-warning shadow-none w-100 mt-3">Manage Order Notes</a>

                <!-- Coffee Type Navigation -->
                @if ($coffee_types)
                    @foreach ($coffee_types as $coffee_type)
                    
                        <a href="#{{ str_replace(' ', '-', $coffee_type->coffee_type) }}" 
                            class="btn btn-light shadow-none w-100 coffee-type-btn" 
                            style=
                                "background-color: {{ $coffee_type->bg_color }} !important; 
                                color: {{ $coffee_type->font_color }} !important;
                                border: 1px solid {{ $coffee_type->bg_color }} !important;">

                                {{ $coffee_type->coffee_type }}
                        </a>

                    @endforeach
                @endif
            </div>

            <!-- Modal -->
            <div class="col-12 dashboard-modal w-100">
                <div class="modal d-block">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger py-1">
                                <h5 class="modal-title text-light">Deleting Data</h5>
                                <button type="button" class="btn btn-danger shadow-none text-light cancel"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer py-1">
                                <button type="button" class="px-4 py-1 shadow-none btn btn-secondary cancel">Cancel</button>
                                <form class="delete-item-form" action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-1 shadow-none btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    @endsection
</body>
</html>

{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
--}}

