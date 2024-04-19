<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia,SoftDeletes ;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'category_id',
        'is_published',
        'published_at',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $value) {
            $query->where('posts.title', 'like', '%' . $value . '%')
                ->orWhere('posts.content', 'like', '%' . $value . '%');
        });
    }

    public function getImageAttribute()
    {
        $mediaItems = $this->getMedia('posts_images');
        $images = [];
        foreach ($mediaItems as $mediaItem) {
            array_push($images, $mediaItem->getUrl());
        }
        return $images;
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('posts_images')
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
