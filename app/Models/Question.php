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

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function specificWord($inputs)
    {
        if(!empty($inputs['search_word'])) {
            return $this->where('title', 'like', '%'.$inputs['search_word'].'%');
        }
    }

    public function specificId($inputs)
    {
        if(!empty($inputs['tag_category_id'])) {
            return $this->where('tag_category_id', '=', $inputs['tag_category_id']);
        }
    }

    public function categoryAddWord($inputs)
    {
            return $this->specificWord($inputs)->specificId($inputs)->get();
    }
}

