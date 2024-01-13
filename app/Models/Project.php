<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "details",
        'status',
        "startDate",
        "endDate",
        'testimonial',
        "client_id",
        "user_id",
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function formatDate($date){
        $dt = Carbon::create($date);
        $formatDate = $dt->toDateString();
        return $formatDate;
    }

    public function formatDateString($date){
        $dt = Carbon::create($date)->locale('fr_FR');
        $day = $dt->dayName;
        $dt_formated = $day . ' ' . $dt->isoFormat('LL');
        return $dt_formated;
    }

    public function shortDateFormat($date){
        $dt = Carbon::create($date)->locale('fr_FR');
        return $dt->isoFormat('LLLL');
    }

    public function dateDifference($date1, $date2){
        $dt1 = Carbon::createMidnightDate($date1);
        $dt2 = Carbon::createMidnightDate($date2);
        
        $months = $dt1->diffInMonths($dt2);
        return $months;
    }
}
