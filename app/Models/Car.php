<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand_id', 
        'condition_id', 
        'name', 
        'mesin', 
        'bahan_bakar', 
        'transmisi', 
        'harga', 
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
    use HasFactory;
    public function baskets()
    {
        return $this->belongsToMany(Basket::class, 'basketandcar', 'car_id', 'basket_id');
    }
}
