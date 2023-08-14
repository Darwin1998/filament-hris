<?php

namespace Domain\Employee\DataTransferObjects;

use Domain\Employee\Enums\EmployeeRoles;
use Illuminate\Support\Facades\Hash;

final class EmployeeData
{
    public function __construct(
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $phone,
        public readonly string $address,
        public readonly string $birth_date,
        public readonly EmployeeRoles $role
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            first_name: $data['first_name'],
            last_name: $data['last_name'],
            email: $data['email'],
            password: Hash::make($data['password']),
            phone: $data['phone'],
            address: $data['address'],
            birth_date: $data['birth_date'],
            role: EmployeeRoles::from($data['role'])
        );

    }
}
