<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'content',
        'service_id',
        'parent_id',
    ];

    public function service(): BelongsTo{
        return $this->belongsTo(Service::class);
    }

    public function parent(): BelongsTo{
        return $this->belongsTo(ServiceComment::class, 'parent_id');
    }

    public function responses(): HasMany{
        return $this->hasMany(ServiceComment::class, 'parent_id');
    }

    public function shortDateFormat($date){
        $dt =  $date->toFormattedDateString();    
        return $dt; 
    }
}
