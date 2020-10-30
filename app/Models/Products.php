<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products';
    use HasFactory;
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
