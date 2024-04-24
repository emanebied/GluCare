<?php

namespace App\Models\website\blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    protected $fillable =['name','slug'];

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }


}
