<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $fillable =   //whitelist
        [
            'name',
            'slug',
            'description',
            'image',
            'status',
            'parent_id'
        ];


    /* public function parent()
     {
         return $this->belongsTo(Category::class, 'parent_id');
     }

     public function children()
     {
         return $this->hasMany(Category::class, 'parent_id');
     }*/
    protected $guarded = ['id']; //blacklist

    public function getImageAttribute()
    {
        $mediaItems = $this->getMedia('categories_images');
        $images = [];
        foreach ($mediaItems as $mediaItem) {
            array_push($images, $mediaItem->getUrl());
        }
        return $images;
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('categories_images')
            ->singleFile()
            ->useDisk('media')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('preview')
                    ->withResponsiveImages()
                    ->quality(80)
                    ->nonQueued();
            });
   }
}
