<?php

namespace App\Enums;

enum FamilyUserRole: string
{
    case Admin = 'admin';
    case Parent = 'parent';
    case Child = 'child';
}
