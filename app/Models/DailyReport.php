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
    {dd($searchmonth);
        return $this->when($searchmonth, function($query, $searchmonth)
        {
            return $query->whereYear('reporting_time', date('Y'))->whereMonth('reporting_time', date('m'));
        })
        ->orderBy('created_at', 'desc')
        ->get();
    }
}

