<?php

namespace Domain\Department\DataTransferObjects;

use Domain\Employee\Models\Employee;

final class DepartmentData
{
    public function __construct(
        public readonly string $title,
        public readonly Employee $employee,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            employee: $data['employee_id']
        );
    }
}
