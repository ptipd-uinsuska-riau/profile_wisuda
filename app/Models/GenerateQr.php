<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateQr extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = 'generate_qrs';
}
