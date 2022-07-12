<?php

namespace App\Models;

use App\Notifications\OrderStatusNotification;
use App\Observers\OrderActionObserver;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'Order placed' => 'Order Placed',
        'Processing' => 'Processing',
        'Order is on Way' => 'Order is on Way',
        'Delivered' => 'Delivered',
        'Paid' => 'Paid',
    ];

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_number',
        'user_id',
        'shipping_address_id',
        'shipping_type_id',
        'payment_method_id',
        'email',
        'subtotal',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function booted()
    {
        static::creating(function (Order $order) {
            $order->uuid = (string)Str::uuid();
        });
    }

    public static function booting()
    {
        self::updated(function (Order $order) {
            if ($order->isDirty('status') && in_array($order->status, ['Order placed', 'Processing', 'Order is on Way', 'Delivered', 'Paid'])) {
                Notification::route('mail', $order->email)->notify(new OrderStatusNotification($order->status));
            }
        });
    }

    public static function boot()
    {
        parent::boot();
        Order::observe(new OrderActionObserver());
        
        static::creating(function ($model){
            $model->order_number=Order::where('series_id',$model->series_id)->max('order_number')+1;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shippingType(): BelongsTo
    {
        return $this->belongsTo(ShippingType::class);
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function variations(): BelongsToMany
    {
        return $this->belongsToMany(Variation::class)
            ->withPivot(['quantity'])
            ->withTimestamps();
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class,'series_id');
    }

}
