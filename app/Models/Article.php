<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
		'title',
		'content',
		'start_time',
		'end_time',
		'summary'
	];
	
    public function user(): belongsTo
	{
        return $this->belongsTo(User::class);
    } 
}
