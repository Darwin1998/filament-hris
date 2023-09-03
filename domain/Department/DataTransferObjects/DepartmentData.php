<?php

namespace Domain\Department\DataTransferObjects;

final class DepartmentData
{
    public function __construct(
        public readonly string $title,
        public readonly array $employees,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            employees: $data['employees']
        );
    }
}
