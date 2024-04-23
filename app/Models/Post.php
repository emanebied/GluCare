<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        'user_id',
        'is_published',
        'published_at',

    ];

    protected $guarded = ['id'];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $value) {
            $query->where('title', 'like', '%' . $value . '%')
                ->orWhere('body', 'like', '%' . $value . '%');
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
    public function category()
    {
        return $this->belongsTo(Category::class)-> withDefault([
            'name' => 'Unknown',
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'first_name' => 'Unknown',
            'last_name' => 'Unknown',
        ]);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

}
