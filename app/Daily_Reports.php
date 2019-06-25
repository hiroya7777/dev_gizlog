<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily_Reports extends Model
{
    protected $fillable = ['title','content','user_id'];
}
