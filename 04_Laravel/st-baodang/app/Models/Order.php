<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin Builder
 */
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'employee_id',
        'order_date',
        'delivery_date',
        'shipping_date',
        'destination'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'invoice_id', 'id');
    }

    public function scopeJoinOrderDetails(Builder $builder)
    {
        $builder->join('orderdetails', 'orderdetails.invoice_id', '=', 'orders.id');
    }

    public function scopeJoinCustomers(Builder $builder)
    {
        $builder->join('customers', 'customers.id', '=', 'orders.customer_id');
    }

    public function scopeJoinEmployees(Builder $builder)
    {
        $builder->join('employees', 'employees.id', '=', 'orders.customer_id');
    }
}
