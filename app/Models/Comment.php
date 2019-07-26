<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'comment',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'id');
    }
}

