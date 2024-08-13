<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'basketandcar', 'basket_id', 'car_id');
    }
}
