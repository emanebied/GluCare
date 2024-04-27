<?php

namespace App\Models\GluCare\blog;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'post_id',
        'status',
    ];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'first_name', 'last_name')->withDefault([
            'first_name' => 'Unknown',
            'last_name' => 'User',
        ]);
    }

    public function post()
    {
        return $this->belongsTo(Post::class)-> withDefault([
            'title' => 'Unknown',
        ])->select('id', 'title','body');
    }



    public function likes()
    {
        return $this->morphToMany(User::class, 'likeable', 'likes')
            ->select('users.id', 'first_name', 'last_name');
    }


}
