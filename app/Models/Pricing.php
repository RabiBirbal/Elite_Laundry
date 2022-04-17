<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $table='pricings';
    protected $fillable=[
        'title',
        'image',
        'price',
        'status'
    ];

    function order(){
        return $this->hasMany(Order::class,'pricing_id','id');
    }
}
