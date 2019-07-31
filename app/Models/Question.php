<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TagCategory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\SearchingScope;

class Question extends Model
{
    use SoftDeletes,SearchingScope;

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

    public function searchQuestion($value)
    {
        return $this->filterLike('title', $value['search_word'])
                    ->filterEqual('tag_category_id', $value['tag_category_id'])
                    ->orderby('created_at', 'desc');
    }
}

