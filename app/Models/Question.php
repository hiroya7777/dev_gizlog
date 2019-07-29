<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TagCategory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

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

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function searchWord($inputs)
    {
        if(!empty($inputs['search_word'])) {
            return $this->where('title', 'like', '%'.$inputs['search_word'].'%');
        }
    }

    public function searchCategory($inputs)
    {
        if (!empty($inputs['tag_category_id'])) {
            return $this->where('tag_category_id', '=', $inputs['tag_category_id']);
        }
    }
}

