<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'user_id',
        'category_id',
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    public function scopePublished(Builder $query)
//    {
//        return $query->whereNotNull('published_at');
//    }*/

}
