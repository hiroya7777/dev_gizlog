<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'reporting_time',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'reporting_time',
    ];

    public function searchSpecificmonth($searchmonth)
    {
        $seachArray = explode('-', $searchmonth);
        return $this->whereYear('reporting_time', '=', $seachArray[0])
            ->whereMonth('reporting_time', '=', $seachArray[1])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}

