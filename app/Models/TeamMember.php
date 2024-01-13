<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        "fullName",
        "email",
        "position",
        "address",
        "description",
        "avatar",
        "facebook",
        "instagram",
        "linkedin",
        "user_id",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shortDateFormat($date){
        $dt = Carbon::create($date)->locale('fr_FR');
        return $dt->isoFormat('LLLL');
    }
}
