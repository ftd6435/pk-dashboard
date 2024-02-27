<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "image",
        "user_id",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function serviceComments() : HasMany{
        return $this->hasMany(ServiceComment::class);
    }

    public function title($title){
        return Str::limit($title, 23);
    }

    public function description($descript){
        return Str::limit($descript, 120);
    }
}
