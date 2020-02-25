<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        //if user have permissions to manage content
        if ($user->can('manage_contents')) {
            return true;
        }
    }
}
