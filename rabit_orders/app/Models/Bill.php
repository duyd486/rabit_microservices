<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
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
