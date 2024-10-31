<?php

namespace App\Policies;


use App\Models\Student;
use Illuminate\Auth\Access\Response;


class StudentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function modify(Student $user, Student $student): Response
    {
        return $user->id === $student->id
        ?Response::allow()
        :Response::deny("You can't do this action");
    }
}
