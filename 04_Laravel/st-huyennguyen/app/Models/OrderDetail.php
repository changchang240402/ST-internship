<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'discount'
    ];
}
