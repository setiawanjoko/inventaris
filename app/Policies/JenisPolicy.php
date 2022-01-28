<?php

namespace App\Policies;

use App\Models\Jenis;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class JenisPolicy
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
     * @param Jenis $jenis
     * @return bool
     */
    public function view(User $user, Jenis $jenis): bool
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
     * @param Jenis $jenis
     * @return bool
     */
    public function update(User $user, Jenis $jenis): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Jenis $jenis
     * @return bool
     */
    public function delete(User $user, Jenis $jenis): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Jenis $jenis
     * @return bool
     */
    public function restore(User $user, Jenis $jenis): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Jenis $jenis
     * @return bool
     */
    public function forceDelete(User $user, Jenis $jenis): bool
    {
        return false;
    }
}
