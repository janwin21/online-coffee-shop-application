<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['costumer_id', 'service_type', 'coffee_name', 'coffee_type', 'coffee_quantity'];
    protected $table = 'orders';

    public function costumer() {
        return $this->belongsTo(Costumer::class);
    }
}
