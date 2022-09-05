<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;

    protected $fillable = ['surname', 'table_number'];
    protected $table = 'costumers';

    public function orders() {
        return $this->hasMany(Orders::class);
    }
}
