<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = [
        'company_id',
        'company_name',
        'transaction_name',
        'address',
        'phone',
        'fax',
        'email'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Supplier::class, 'company_id', 'company_id');
    }
}
