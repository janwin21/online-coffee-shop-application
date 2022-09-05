@extends('layouts.master')
<body>
    
    @section('main-content')

    <!-- Queue Header -->
    <div class="queue-header container text-center">
        <object class="my-5" data="../svg/waiting.svg"></object>
        <h1 class="kaushan-script text-primary">Queue</h1>
        <p class="mb-5">Your order is pending. Please wait for a while until your order is deliver.</p>
        <button class="open-sans btn btn-primary shadow-none" data-nav="table-{{ (session('table_number')) ? session('table_number') : '-1' }}">Check your Line</button>
    </div>
    
    <!-- Queue Collection -->
    <div class="queue-collection container text-center my-5 pt-5">
        <div class="row">
            @foreach ($costumers as $costumer)
                
            <div class="col-3 p-3">
                <form action="{{ route('drinks.destroy', $costumer->id) }}" method="POST">
                @csrf
                @method('DELETE')

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
                                
                                @foreach ($costumer->orders as $order)
                                    
                                <tr class="row m-0 p-0">
                                    <td class="col-2 m-0 p-0 open-sans">{{ $order->quantity }}</td>
                                    <td class="col-5 m-0 p-0 open-sans {{ str_replace(' ', '-', $order->service_type) }}">{{ $order->coffee_name }}</td>
                                    <td class="col-5 m-0 p-0 open-sans text-end">&#8369;1000</td>
                                </tr>

                                @endforeach
                                
                                <tr class="row m-0 p-0 mt-4">
                                    <td class="col-2 m-0 p-0 open-sans"></td>
                                    <td class="col-5 m-0 p-0 open-sans"><strong>Total</strong></td>
                                    <td class="col-5 m-0 p-0 open-sans text-end"><strong>&#8369;1000</strong></td>
                                </tr>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 py-1 shadow-none m-3">Cancel</button>
                    </div>
                </div>

                </form>
            </div>
            
            @endforeach
        </div>
    </div>
        
    @endsection
</body>
</html>