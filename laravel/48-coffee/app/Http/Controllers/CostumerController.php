<?php

namespace App\Http\Controllers;

use App\Http\Requests\CostumerRequest;
use App\Models\Coffee;
use App\Models\CoffeeType;
use Illuminate\Http\Request;
use App\Models\Costumer;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('pages.queue', [
            'costumers' => Costumer::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {

        return view('pages.drinks', [
            'coffee_types' => CoffeeType::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostumerRequest $request) 
    {
        $request->validated();

        $coffeeNames = explode(',', $request->coffee_names);
        $coffeeTypes = explode(',', $request->coffee_types);
        $coffeeQuantities = explode(',', $request->coffee_quantities);

        session(['surname' => $request->surname]);
        session(['table_number' => $request->table_number]);

        $costumer = Costumer::create([
            'surname' => $request->surname,
            'table_number' => $request->table_number
        ]);

        for($i = 0; $i < $request->row_size; $i++) {
            $quantity = $coffeeQuantities[$i];
            $coffee = Coffee::where('coffee_name', $coffeeNames[$i])->first();
            $coffee->available -= $quantity;

            Orders::create([
                'costumer_id' => $costumer->id,
                'user_id' => (Auth::user()) ? Auth::user()->id : null,
                'coffee_id' => $coffee->id,
                'service_type' => strval($request->service_type),
                'coffee_name' => strval($coffeeNames[$i]),
                'coffee_type' => strval($coffeeTypes[$i]),
                'coffee_quantity' => $quantity
            ]);

            $coffee->save();
        }

        return redirect(route('drinks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) 
    {
        $costumer = Costumer::where('id', $id)->first();

        if($request->button_type === 'cancel') {
            foreach($costumer->orders as $order) {
                $order->coffee->available += $order->coffee_quantity;
                $order->coffee->save();
            }
        }

        $costumer->delete();

        return redirect(route('drinks.index'));
    }
}
