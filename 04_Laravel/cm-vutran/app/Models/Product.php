<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $fillable = [
        'product_id',
        'product_name',
        'company_id',
        'category_id',
        'amount',
        'unit',
        'price',
    ];

    protected $hidden = ['pivot'];
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'company_id', 'company_id');
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'orderdetails', 'product_id', 'invoice_id', 'product_id');
    }
}
