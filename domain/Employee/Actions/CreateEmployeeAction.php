<?php

namespace Domain\Employee\Actions;

use Domain\Employee\DataTransferObjects\EmployeeData;
use Domain\Employee\Models\Employee;

class CreateEmployeeAction
{
    public function execute(EmployeeData $employeeData): Employee
    {
        return Employee::create([
            'first_name' => $employeeData->first_name,
            'last_name' => $employeeData->last_name,
            'email' => $employeeData->email,
            'phone' => $employeeData->phone,
            'address' => $employeeData->address,
            'birth_date' => $employeeData->birth_date,
            'password' => $employeeData->password,
            'role' => $employeeData->role
        ]);
    }
}
