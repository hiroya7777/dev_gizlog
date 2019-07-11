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

    public function searchSpecificmonth($searchdate)
    {
        return $this->when($searchdate, function($query, $searchdate)
        {
            return $query->where('reporting_time', 'LIKE', '%'.$searchdate.'%');
        })
        ->orderBy('reporting_time', 'desc')
        ->get();
    }
}

