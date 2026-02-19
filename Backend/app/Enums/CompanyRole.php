<?php

namespace App\Enums;

enum CompanyRole: string
{
    case OWNER = 'owner';
    case MANAGER = 'manager';
    case SUPERVISOR = 'supervisor';
    case EMPLOYEE = 'employee';
}
