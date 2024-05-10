<?php

namespace App\Models\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['provider', 'provider_id', 'user_id','provider_token'];


    protected $hidden = ['provider_token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setProviderTokenAttribute($value)
    {
  $this->attributes['provider_token'] = encrypt($value);
    }

    public function getProviderTokenAttribute($value)
    {
        return decrypt($value);
    }
}
