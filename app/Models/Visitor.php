<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'country',
        'country_code',
        'region',
        'city',
        'latitude',
        'longitude',
        'user_agent',
        'device',
        'browser',
        'url',
    ];
}
