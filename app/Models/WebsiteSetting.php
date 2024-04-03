<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class WebsiteSetting extends Model implements HasMedia
{
    use HasApiTokens,HasRoles, HasFactory, Notifiable ,InteractsWithMedia;

    protected $table = 'website_settings';

    protected $fillable = [
        'name',
        'image',
        'email',
        'description',
        'facebook_link',
        'twitter_link',
        'instagram_link',
    ];
    protected $guarded =['id'];
    public function getImageAttribute()
    {
        $mediaItems = $this->getMedia('settings_images');
        $images = [];
        foreach ($mediaItems as $mediaItem) {
            array_push($images, $mediaItem->getUrl());
        }
        return $images;
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('settings_images')
            ->singleFile()
            ->useDisk('media')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('preview')
                    ->width(100)
                    ->nonQueued();
            });
    }


}

