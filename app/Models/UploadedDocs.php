<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedDocs extends Model
{
    use HasFactory;

    protected $fillable = [
        'fileName',
        'document',
        'departmentName',
        'status',
    ];
}
