<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'content',
        'post_id',
        'parent_id'
    ];

    public function post() : BelongsTo{
        return $this->belongsTo(Post::class);
    }

    public function parent() : BelongsTo{
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function responses() : HasMany{
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function shortDateFormat($date){
        $dt =  $date->toFormattedDateString();    
        return $dt; 
    }
}
