<?php

namespace App\Models;

use App\Observers\ProductActionObserver;
use Cknow\Money\Money;
use Cviebrock\EloquentSluggable\Sluggable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;
    use Sluggable;

    public const STATUS_SELECT = [
        '1' => 'Available',
        '2' => 'Not available',
    ];

    public $table = 'products';

    protected $appends = [
        'product_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'price',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Product::observe(new ProductActionObserver());
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 300, 300);
        $this->addMediaConversion('preview')->fit('crop', 900, 900);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function formattedPrice(): Money
    {
        return Money::RWF($this->price);
    }
    public function getProductImageAttribute(): MediaCollection
    {
        $files = $this->getMedia('product_image');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')
            ->useFallbackUrl(url('/storage/no-product-image-available.png'));
    }
    public function variations(): HasMany
    {
        return $this->hasMany(Variation::class);
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]

        ];
    }

    public function scopeTrending($query)
    {
        return $query->inRandomOrder()->take(8);
    }

    public function scopeMight($query)
    {
        return $query->inRandomOrder()->take(4);
    }
}
