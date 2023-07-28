<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Joiner extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'note',
        'phone',
        'birtherday',
        'ID_number'
    ];
}
