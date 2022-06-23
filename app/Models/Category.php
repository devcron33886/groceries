<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model implements HasMedia
{
    use HasFactory;
    use HasRecursiveRelationships;
    use Sluggable;
    use InteractsWithMedia;

    protected $dates=[
        'created_at','updated_at','deleted_at'
    ];

    protected $fillable=['name','slug','parent_id','created_at','updated_at','deleted_at'];

    public function sluggable(): array
    {
        return [

            'slug' => [
                'source' => 'name'
            ]

        ];
    }

     /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb250X250')
            ->fit(Manipulations::FIT_CROP, 250, 250);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')
            ->useFallbackUrl(url('/storage/no-product-image-available.png'));
    }

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

}
