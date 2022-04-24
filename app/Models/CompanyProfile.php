<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $table='company_profiles';
    protected $fillable=[
        'logo',
        'favicon',
        'email',
        'phone',
        'address',
        'short_introduction',
        'introduction',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'linked_in',
        'working_days',
        'working_hours',
        'map',
        'video'
    ];
}
