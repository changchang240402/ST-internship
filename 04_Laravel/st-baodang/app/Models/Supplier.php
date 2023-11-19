<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Builder
 */
class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'suppliers';

    protected $fillable = [
        'company_id',
        'company_name',
        'transaction_name',
        'address',
        'email',
        'phone',
        'fax'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'company_id', 'company_id');
    }

    public function scopeJoinProducts(Builder $builder)
    {
        $builder->join('products', 'products.company_id', '=', 'suppliers.company_id');
    }

    public function scopeJoinCustomers(Builder $builder)
    {
        $builder->join('customers', 'customers.transaction_name', '=', 'suppliers.transaction_name');
    }
}
