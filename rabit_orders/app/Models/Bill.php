<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    const STATUS_FAILED = 0;
    const STATUS_PROCESSING = 1;
    const STATUS_PENDING = 2;
    const STATUS_PAID = 3;

    protected $table = 'bill';
    protected $fillable = [
        'status',
        'total_price',
        'order_code',
        'user_id',
        'address',
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
