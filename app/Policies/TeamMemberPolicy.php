<?php

namespace App\Policies;

use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TeamMemberPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TeamMember $teamMember): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === "admin" || $user->role === "editer";
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TeamMember $teamMember): bool
    {
        if($user->role === "admin") return true;
        if($user->id === $teamMember->user_id) return true;
        
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TeamMember $teamMember): bool
    {
        return $user->role === "admin";
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TeamMember $teamMember): bool
    {
        return $user->role === "admin";
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TeamMember $teamMember): bool
    {
        return $user->role === "admin";
    }
}
