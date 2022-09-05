<?php

namespace App\Http\Controllers;

use App\Http\Requests\CostumerRequest;
use Illuminate\Http\Request;
use App\Models\Costumer;
use App\Models\Orders;

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
        return view('pages.drinks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostumerRequest $request) 
    {
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
            Orders::create([
                'costumer_id' => $costumer->id,
                'service_type' => strval($request->service_type),
                'coffee_name' => strval($coffeeNames[$i]),
                'coffee_type' => strval($coffeeTypes[$i]),
                'coffee_quantity' => $coffeeQuantities[$i]
            ]);
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
    public function destroy($id) 
    {
        Costumer::where('id', $id)->delete();
        return redirect(route('drinks.index'));
    }
}
