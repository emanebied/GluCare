<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\website\blog\Comment;
use App\Models\website\blog\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia


{
    use HasApiTokens,HasRoles,HasFactory, Notifiable ,InteractsWithMedia;
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'device_name',
        'code',
        'role',
        'phone',
        'gender',
        'status',
        'image',
        'birth_date',
        'experience_years',
        'qualifications',
        'specialization',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'code_expired_at' => 'datetime',
        'phone_verified_at'=>'datetime',
    ];


    protected $guarded =['id'];
    public function getImageAttribute()
    {
        $mediaItems = $this->getMedia('users_images');
        $images = [];
        foreach ($mediaItems as $mediaItem) {
            array_push($images, $mediaItem->getUrl());
        }
        return $images;
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('users_images')
            ->singleFile()
            ->useDisk('media')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('preview')
                    ->withResponsiveImages()
                    ->nonQueued();
            });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
