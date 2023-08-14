<?php

namespace Domain\Employee\Models;

use Domain\Employees\Enums\EmployeeRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

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
        'birth_date' => 'date',
    ];
}
