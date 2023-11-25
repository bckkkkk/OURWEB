<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use \Conner\Tagging\Taggable;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
		'title',
		'content',
		'start_time',
		'end_time',
		'summary',
        'maximum',
        'start_time_event',
        'end_time_event',
        'tags'
	];
	
    public function user(): belongsTo
	{
        return $this->belongsTo(User::class);
    } 

	public function joiners(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'joiners') -> withPivot('phone', 'birthday', 'ID_number', 'note', 'blacklist') -> withTimestamps();
    }

    public function attend(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'checks', 'user_id', 'article_id') -> withPivot('checkdate', 'state');
    }
}
