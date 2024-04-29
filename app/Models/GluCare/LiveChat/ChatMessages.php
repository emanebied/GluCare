<?php

namespace App\Models\GluCare\LiveChat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'chat_id',
        'user_id',
        'type',
        'data'
    ];
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'name', 'email', 'phone', 'image');
    }
}
