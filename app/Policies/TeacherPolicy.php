<?php

namespace App\Policies;

use App\Models\Teacher;
use Illuminate\Auth\Access\Response;

class TeacherPolicy
{
    /**
     * Create a new policy instance.
     */

        public function modify(Teacher $user, Teacher $teacher): Response
        {
            return $user->id === $teacher->id
            ?Response::allow()
            :Response::deny("You can't do this action");
        }
    
}
