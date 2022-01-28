<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\Ruang;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RuangPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability){
        return $user->permission_id == Permission::IS_ADMIN;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Ruang $ruang
     * @return bool
     */
    public function view(User $user, Ruang $ruang): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Ruang $ruang
     * @return bool
     */
    public function update(User $user, Ruang $ruang): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Ruang $ruang
     * @return bool
     */
    public function delete(User $user, Ruang $ruang): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Ruang $ruang
     * @return bool
     */
    public function restore(User $user, Ruang $ruang): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Ruang $ruang
     * @return bool
     */
    public function forceDelete(User $user, Ruang $ruang): bool
    {
        return false;
    }
}
