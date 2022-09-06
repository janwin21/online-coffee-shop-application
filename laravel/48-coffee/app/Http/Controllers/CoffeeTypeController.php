<?php

namespace App\Http\Controllers;

use App\Models\CoffeeType;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class CoffeeTypeController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'coffee_type' => ['required', 'string', 'max:60', 'unique:coffee_types'],
            'bg_color' => ['required', 'string'],
            'font_color' => ['required', 'string']
        ]);

        CoffeeType::create([
            'coffee_type' => $request->coffee_type,
            'bg_color' => $request->bg_color,
            'font_color' => $request->font_color
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
        CoffeeType::where('id', $id)->delete();
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
