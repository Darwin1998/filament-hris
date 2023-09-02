<?php

namespace Domain\Department\Actions;

use Domain\Department\DataTransferObjects\DepartmentData;
use Domain\Department\Models\Department;

class CreateDepartmentAction
{
    public function execute(DepartmentData $departmentData): Department
    {
        return Department::create([

        ]);
    }
}
