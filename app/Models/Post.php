<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "image",
        "category_id",
        "user_id",
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function title($title){
        return Str::limit($title, 60);
    }

    public function content($content){
        return Str::limit($content, 150);
    }

    public function postDate($date){
        $dt =  $date->toFormattedDateString();    
        return $dt;      
    }
}
