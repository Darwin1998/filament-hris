<?php

namespace Domain\Employee\Models;

use Domain\Department\Models\Department;
use Domain\Employee\Enums\EmployeeRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Employee extends Model implements HasMedia
{
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
        'department_id'
    ];

    protected $casts = [
        'role' => EmployeeRoles::class,
        'birth_date' => 'date',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('documents')->useDisk('s3');
        $this->addMediaCollection('profile_picture')->useDisk('s3');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
