<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClientPolicy
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
    public function view(User $user, Client $client): bool
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
    public function update(User $user, Client $client): bool
    {
        if($user->id === $client->user_id) return true;
        if($user->role === "admin") return true;
        
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Client $client): bool
    {
        return $user->role === "admin";
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Client $client): bool
    {
        return $user->role === "admin";
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Client $client): bool
    {
        return $user->role === "admin";
    }
}
