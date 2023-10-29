<?php

namespace App\Models;

use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    public const ROLE_ADMIN = 'Admin';
    public const ROLE_CLIENT= 'Client';
}
