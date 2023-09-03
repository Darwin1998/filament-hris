<?php

namespace Domain\Department\Actions;

use Domain\Department\DataTransferObjects\DepartmentData;
use Domain\Department\Models\Department;
use Domain\Employee\Models\Employee;

class CreateDepartmentAction
{
    public function execute(DepartmentData $departmentData): Department
    {
        $department = Department::create([
            'title' => $departmentData->title,
        ]);

        foreach ($departmentData->employees as $employeeId) {
            $employee = Employee::find($employeeId);
            $department->employees()->save($employee);
        }

        return $department;
    }
}
