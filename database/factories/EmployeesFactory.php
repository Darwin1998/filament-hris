<?php

namespace Database\Factories;

use Domain\Department\Models\Department;
use Domain\Employee\Enums\EmployeeRoles;
use Domain\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class EmployeesFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'birth_date' => fake()->date(),
            'password' => Hash::make('secret'),
            'role' => EmployeeRoles::DEVELOPER->value,
            'department_id' => Department::query()->first()->getKey()

        ];
    }
}
