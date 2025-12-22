<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $fillable = [
        'quantity',
        'total_price',
        'product_id',
        'bill_id',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
