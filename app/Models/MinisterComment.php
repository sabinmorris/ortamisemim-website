<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinisterComment extends Model
{
    use HasFactory;

    protected $fillable = [

        'minister_name',
        'minister_title',
        'minister_image',
        'discription',
        'status',
    ];
}
