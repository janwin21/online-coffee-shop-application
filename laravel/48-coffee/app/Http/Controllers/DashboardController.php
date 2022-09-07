<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeType;
use App\Models\User;

class DashboardController extends Controller
{
    
    public function dashboard() 
    {
        return view('dashboard', [
            'users' => User::get(),
            'coffee_types' => CoffeeType::get()
        ]);
    }

}
