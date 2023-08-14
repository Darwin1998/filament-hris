<?php

namespace Domain\Employee\Enums;

enum EmployeeRoles: string
{
    case MANAGER = 'manager';
    case DEVELOPER = 'developer';
    case DESIGNER = 'designer';
}
