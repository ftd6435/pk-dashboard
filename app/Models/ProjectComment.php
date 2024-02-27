<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'content',
        'project_id',
        'parent_id',
    ];

    public function project(): BelongsTo{
        return $this->belongsTo(Project::class);
    }

    public function parent(): BelongsTo{
        return $this->belongsTo(ProjectComment::class, 'parent_id');
    }

    public function responses() : HasMany{
        return $this->hasMany(ProjectComment::class, 'parent_id');
    }

    public function shortDateFormat($date){
        $dt =  $date->toFormattedDateString();    
        return $dt; 
    }
}
