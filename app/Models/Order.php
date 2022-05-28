<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const SHIP_STATUS_PENDING = 'pending';
    const SHIP_STATUS_DELIVERED = 'delivered';
    const SHIP_STATUS_RECEIVED = 'received';

    public static $shipStatusMap = [
        self::SHIP_STATUS_PENDING   => 'Not shipped',
        self::SHIP_STATUS_DELIVERED => 'Shipped',
        self::SHIP_STATUS_RECEIVED  => 'Received',
    ];

    protected $fillable = [
        'user_id',
        'total_amount',
        'remark',
        'status',
        'payment_method'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
