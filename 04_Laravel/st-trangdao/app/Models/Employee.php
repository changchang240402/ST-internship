<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'employees';
    protected $fillable = [
        'employee_id',
        'last_name',
        'first_name',
        'birthday',
        'start_date',
        'address',
        'phone',
        'base_salary',
        'allowance'
    ];
    protected $attributes = [
        'allowance' => 0,
    ];
    protected $casts = [
        'base_salary' => 'integer',
        'allowance' => 'integer'
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'employee_id', 'employee_id');
    }

    public function scopeLeftJoinOrder($query)
    {
        return $query->leftjoin('orders', 'orders.employee_id', '=', 'employees.employee_id');
    }
}
