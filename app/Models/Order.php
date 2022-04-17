<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';
    protected $fillable=[
        'name',
        'email',
        'phone',
        'address',
        'pickup_date',
        'delivery_date',
        'instruction',
        'terms'
    ];

    function pricing(){
        return $this->belongsTo(Pricing::class);
    }
}
