<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'orderdetails';
    protected $fillable = [
        'invoice_id',
        'product_id',
        'price',
        'amount',
        'discount',
    ];

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'invoice_id', 'id');
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function scopeJoinProduct($query)
    {
          return $query->join('products', 'orderdetails.product_id', '=', 'products.product_id');
    }

    public function scopeJoinOrder($query)
    {
          return $query->join('orders', 'orderdetails.invoice_id', '=', 'orders.id');
    }
}
