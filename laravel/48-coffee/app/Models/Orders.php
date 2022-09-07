<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'costumer_id', 'user_id', 'coffee_id', 'service_type', 'coffee_name', 'coffee_type', 'coffee_quantity'
    ];
    
    protected $table = 'orders';

    public function costumer() {
        return $this->belongsTo(Costumer::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function coffee() {
        return $this->belongsTo(Coffee::class);
    }
}
