<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullName',
        'email',
        'subject',
        'infoMessage'
    ];
}
