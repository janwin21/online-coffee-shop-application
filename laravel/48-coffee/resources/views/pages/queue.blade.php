@extends('layouts.master')
<body>
    
    @section('main-content')

    <!-- Queue Header -->
    <div class="queue-header container text-center">
        <object class="my-5" data="../svg/waiting.svg"></object>
        <h1 class="kaushan-script text-primary">Queue</h1>
        <p class="mb-5">Your order is pending. Please wait for a while until your order is deliver.</p>
        <button class="open-sans btn btn-primary shadow-none" data-nav="table-{{ (session('table_number')) ? session('table_number') : '-1' }}">Check your Line</button>

        <div class="row mt-5">
            <div class="col-4"><strong>
                <p><span class="take-out">TAKE-OUT</span> for <span class="take-out">RED</span> drinks.</p>
            </strong></div>
            <div class="col-4"><strong>
                <p><span class="dine-in">DINE-IN</span> for <span class="dine-in">GREEN</span> drinks.</p>
            </strong></div>
            <div class="col-4"><strong>
                <p><span class="delivery">DELIVERY</span> for <span class="delivery">PURPLE</span> drinks.</p>
            </strong></div>
        </div>
    </div>
    
    <!-- Queue Collection -->
    <div class="queue-collection container text-center mb-5 pt-5">
        <div class="row">
            @foreach ($costumers as $costumer)
                
            <div class="col-3 p-3">

                <div class="card" id="table-{{ $costumer->table_number }}">
                    <img class="card-img-top w-100" src="../images/items/jpg/notes.jpg" alt="...">
                    <div class="cover w-100 h-100"></div>
                    <div class="card-body text-start w-100 h-100">
                        <h5 class="card-title roboto mb-2"><strong>T{{ $costumer->table_number }} {{ $costumer->surname }}</strong></h5>
                        <div class="w-100 h-75 mt-3 p-0">
                            <table class="m-0 p-0 w-100">
                                <tr class="row m-0 p-0">
                                    <th class="col-2 m-0 p-0 open-sans">Pcs</th>
                                    <th class="col-5 m-0 p-0 open-sans">Name</th>
                                    <th class="col-5 m-0 p-0 open-sans text-end">Amount</th>
                                </tr>

                                @php
                                    $total_amount = 0;
                                @endphp
                                
                                @foreach ($costumer->orders as $order)

                                @php
                                    $initial_price = $order->coffee_quantity * $order->coffee->price;
                                    $total_amount += $initial_price;
                                @endphp
                                    
                                <tr class="row m-0 p-0 my-2">
                                    <td class="col-2 m-0 p-0 open-sans">{{ $order->coffee_quantity }}</td>
                                    <td class="col-5 m-0 p-0 open-sans {{ str_replace(' ', '-', $order->service_type) }}"><strong>{{ $order->coffee->coffee_name }}</strong></td>
                                    <td class="col-5 m-0 p-0 open-sans text-end">&#8369;{{ $initial_price }}</td>
                                </tr>

                                @endforeach
                                
                                <tr class="row m-0 p-0 mt-4">
                                    <td class="col-2 m-0 p-0 open-sans"></td>
                                    <td class="col-5 m-0 p-0 open-sans"><strong>Total</strong></td>
                                    <td class="col-5 m-0 p-0 open-sans text-end"><strong>&#8369;{{ $total_amount }}</strong></td>
                                </tr>
                            </table>
                        </div>

                        <form action="{{ route('drinks.destroy', $costumer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <input required class="d-none finalize-input" type="text" name="button_type">

                        @if (Auth::user())
                            @if (isset($order))
                            @if (Auth::user()->id == $order->user->id)

                            <button type="submit" class="btn finalize-btn btn-danger px-4 py-1 shadow-none m-3" data-value="cancel">Cancel</button>

                            @endif
                            @endif

                            <button type="submit" class="btn finalize-btn btn-secondary px-4 py-1 shadow-none m-3" data-value="finish">Finish</button>
                        @endif

                        </form>

                    </div>
                </div>

            </div>
            
            @endforeach
        </div>
    </div>
        
    @endsection
</body>
</html>