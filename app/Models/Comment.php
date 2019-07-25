<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'comments',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}

