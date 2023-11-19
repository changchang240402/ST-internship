<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'product_id',
        'product_name',
        'company_id',
        'category_id',
        'amount',
        'unit',
        'price'
    ];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'category_id', 'category_id');
    }

    public function suppliers(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'company_id', 'company_id');
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'product_id');
    }
    public function scopeJoinSupplier($query)
    {
          return $query->join('suppliers', 'suppliers.company_id', '=', 'products.company_id');
    }

    public function scopeJoinCategory($query)
    {
          return $query->join('categories', 'categories.category_id', '=', 'products.category_id');
    }

    public function scopeLeftJoinOrderDetail($query)
    {
        return $query->leftjoin('orderdetails', 'orderdetails.product_id', '=', 'products.product_id');
    }
}
