<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Auth;

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
        'reporting_time',
    ];

    public function specificMonth($searchmonth)
    {
        $carbon = Carbon::parse($searchmonth);
        $year = $carbon->year;
        $month = $carbon->month;
        return $this->whereYear('reporting_time', $year)
            ->whereMonth('reporting_time', $month)
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
    }
}

