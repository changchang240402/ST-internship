<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = "employee_id";
  
    // The 'keyType' set to "string" allows the edit route to derive the primary key from the model
    protected $keyType = "string";
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

    public function orders()
    {
        return $this->hasMany(Order::class, 'employee_id', 'employee_id');
    }
}
