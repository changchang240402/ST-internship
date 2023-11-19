<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Builder
 */
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
        'discount'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'invoice_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function scopeJoinProducts(Builder $builder)
    {
        $builder->join('products', 'products.product_id', '=', 'orderdetails.product_id');
    }
}
