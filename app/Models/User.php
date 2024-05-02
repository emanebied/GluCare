<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\GluCare\Appointments\Appointment;
use App\Models\GluCare\blog\Comment;
use App\Models\GluCare\blog\Post;
use App\Models\GluCare\Detection\PatientDataOfDiabetes;
use App\Models\GluCare\LiveChat\Chat;
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
        'name',
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'role',
        'is_online',
        'device_name',
        'code',
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


    public function patientDataOfDiabetes(){
        return $this->hasOne(PatientDataOfDiabetes::class);
    }

    public function chats()
    {
        return $this->belongsToMany(Chat::class);
    }


    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

}
