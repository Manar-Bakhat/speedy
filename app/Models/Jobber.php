<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobber extends Model
{
    use HasFactory;

    public function getCategory()
    {
        return $this->hasOne('App\Models\JobberCategory', 'id', 'jobber_category_id');
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
