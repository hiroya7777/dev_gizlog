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
        'contents',
        'reporting_time',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'reporting_time',
    ];

    public function searchReport($dates)
    {
        return $this->when($dates,function($query,$dates)
        {
                return $query->where('reporting_time', 'LIKE', "%$dates%");
        })->orderBy('created_at','desc')->get();
    }
}

