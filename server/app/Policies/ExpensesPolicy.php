<?php

namespace App\Policies;

use App\Models\Expenses;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExpensesPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Expenses $expenses)
    {
        return $user->id === $expenses->user_id
            ? Response::allow()
            : Response::deny('You do not own this expense.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Expenses $expenses)
    {
        return $user->id === $expenses->user_id
            ? Response::allow()
            : Response::deny('You do not own this expense.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Expenses $expenses)
    {
        return $user->id === $expenses->user_id
            ? Response::allow()
            : Response::deny('You do not own this expense.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Expenses $expenses)
    {
        return $user->id === $expenses->user_id
            ? Response::allow()
            : Response::deny('You do not own this expense.');
    }
}
