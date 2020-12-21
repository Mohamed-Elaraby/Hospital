<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public function users()
    {
        return $this -> hasMany(User::class);
    }
}
