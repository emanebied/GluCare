<?php

namespace App\Models\GluCare\LiveChat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['data', 'direct_message'];
    protected $casts = [
        'data'           => 'array',
        'direct_message' => 'boolean',
        'private'        => 'boolean',
    ];

    public function messages()
    {
        return $this->hasMany(ChatMessages::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'chat_user', 'chat_id', 'user_id')
            ->select('users.id', 'name', 'email', 'phone', 'image'); // Specify the users table explicitly
    }

    public function isParticipant($user_id)
    {
        $data = $this->participants->where('id', $user_id)->first();
        if(!empty($data) ){
            return true;
        }
        return false;
    }


    public function makePrivate($isPrivate = true)
    {
        $this->private = $isPrivate;
        $this->save();

        return $this;
    }



}
