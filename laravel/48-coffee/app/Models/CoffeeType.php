<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeType extends Model
{
    use HasFactory;

    protected $fillable = ['coffee_type', 'bg_color', 'font_color'];
    protected $table = 'coffee_types';
}
