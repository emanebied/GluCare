<?php

namespace App\Models\website\blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia ,SoftDeletes;


    protected $fillable =   //whitelist
        [
            'name',
            'slug',
            'description',
            'image',
            'status',
            'parent_id',
        ];
    protected $guarded = ['id']; //blacklist


       public function parent()
         {
             return $this->belongsTo(Category::class, 'parent_id')->withDefault([
                        'name' => 'No Parent'
                    ]
             )->select('id', 'name');
         }

         public function children()
         {
             return $this->hasMany(Category::class, 'parent_id');
         }
        public function posts()
        {
            return $this->hasMany(Post::class);

        }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $value) {
            $query->where('name', 'like', '%' . $value . '%')
                ->orWhere('description', 'like', '%' . $value . '%');
        });
    }

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
