<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'parent_id',
        'thumbnail_url',
    ];


    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childrens(){
        return $this->hasMany(Category::class, 'parent_id');
    }
}
