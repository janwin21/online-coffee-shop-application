<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeType;

class DashboardController extends Controller
{
    
    public function dashboard() {
        $coffee_types = CoffeeType::get();
        
        // dd($coffee_type); exit;

        return view('dashboard', [
            'coffee_types' => $coffee_types
        ]);
    }

}
