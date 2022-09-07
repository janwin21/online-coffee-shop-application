<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    protected $fillable = [
        'coffee_type_id', 'coffee_name', 'price', 'available', 'image_path', 'short', 'description'
    ];

    protected $table = 'coffees';

    public function coffee_type() {
        return $this->belongsTo(CoffeeType::class);
    }

    public function orders() {
        return $this->hasMany(Orders::class);
    }
}
