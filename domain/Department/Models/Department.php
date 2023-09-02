<?php

namespace Domain\Department\Models;

use Domain\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = [
        'title',
        'employee_id',
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
