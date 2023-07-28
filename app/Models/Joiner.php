<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joiner extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'phone',
        'birtherday',
        'ID_number'
    ];
}
