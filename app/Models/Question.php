<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'user_id' ,
        'title',
        'content',
        'tag_category_id',
    ];
}

