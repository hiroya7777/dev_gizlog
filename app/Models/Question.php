<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TagCategory;

class Question extends Model
{
    protected $fillable = [
        'user_id' ,
        'title',
        'content',
        'tag_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(TagCategory::class, 'tag_category_id');
    }
}

