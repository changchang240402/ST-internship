<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'category_name'
    ];
    
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }

    public function providerCompany()
    {
        return $this->belongsTo(Supplier::class, 'category_id', 'category_id');
    }
}
