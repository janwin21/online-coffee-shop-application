<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoffeeRequest;
use App\Models\CoffeeType;
use App\Models\Coffee;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Validator;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoffeeRequest $request)
    {
        $request->validated();
        
        $coffee_type = CoffeeType::where('coffee_type', $request->coffee_type_name)->first();

        Coffee::create([
            'coffee_type_id' => $coffee_type->id, 
            'coffee_name' => $request->coffee_name, 
            'price' => $request->price,
            'available' => $request->available, 
            'image_path' => $this->upload($request), 
            'short' => $request->short, 
            'description' => $request->description
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
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
        Coffee::where('id', $id)->delete();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    // image storage
    public function upload($request) {
        $image_name = uniqid() . '-' . $request->coffee_name . '.' . $request->image->extension();
        $request->image->move(public_path('images/saveCoffees'), $image_name);
        return $image_name;
    }
}
