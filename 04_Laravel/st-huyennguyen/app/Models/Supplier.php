<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    use HasFactory;

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

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $companyName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCompanyName($query, $companyName)
    {
        return $query->where('company_name', 'like', '%' . $companyName . '%');
    }
}
