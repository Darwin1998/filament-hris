<?php

namespace Domain\Employee\Models;

use Domain\Employees\Enums\EmployeeRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{

    use HasFactory,SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'birth_date',
        'password',
        'role',
    ];

    protected $casts = [
        'role' => EmployeeRoles::class,
        'birth_date' => 'date'
    ];
}
