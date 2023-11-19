<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'customer_id',
        'employee_id',
        'order_date',
        'delivery_date',
        'shipping_date',
        'destination',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'employee_id', 'employee_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, "id", "invoice_id");
    }
}
