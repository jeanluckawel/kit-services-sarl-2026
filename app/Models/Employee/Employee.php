<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    //
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'employee_id', 'first_name', 'last_name', 'middle_name', 'gender', 'date_of_birth', 'number_card', 'pays', 'marital_status', 'number_of_children', 'photo', 'status',
    ];

    public function address()
    {
        return $this->hasOne(Address::class,'employee_id','employee_id');
    }

    public function company()
    {
        return $this->hasOne(Company::class,'employee_id','employee_id');
    }

    public function children()
    {
        return $this->hasMany(Children::class, 'employee_id','employee_id');
    }

    public function dependants()
    {
        return $this->hasMany(Dependant::class, 'employee_id','employee_id');
    }

    public function emergencies()
    {
        return $this->hasMany(Emergency::class, 'employee_id','employee_id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'employee_id','employee_id');
    }
}
