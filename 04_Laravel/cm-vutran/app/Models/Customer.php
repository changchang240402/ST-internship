<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';
    
    protected $fillable = [
        'company_name',
        'transaction_name',
        'address',
        'email',
        'phone_number',
        'fax',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}