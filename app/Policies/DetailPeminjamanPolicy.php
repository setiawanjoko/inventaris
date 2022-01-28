<?php

namespace App\Policies;

use App\Models\DetailPeminjaman;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DetailPeminjamanPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability){
        if($user->permission_id == Permission::IS_ADMIN) return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param DetailPeminjaman $detailPeminjaman
     * @return bool
     */
    public function view(User $user, DetailPeminjaman $detailPeminjaman): bool
    {
        return $user->permission_id == Permission::IS_OPERATOR
            || $detailPeminjaman->peminjaman->peminjam_id == $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param DetailPeminjaman $detailPeminjaman
     * @return bool
     */
    public function update(User $user, DetailPeminjaman $detailPeminjaman): bool
    {
        return $user->permission_id == Permission::IS_OPERATOR
            || $detailPeminjaman->peminjaman->peminjam_id == $user->id
            && $detailPeminjaman->peminjaman->status == 'pengajuan';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param DetailPeminjaman $detailPeminjaman
     * @return bool
     */
    public function delete(User $user, DetailPeminjaman $detailPeminjaman): bool
    {
        return $user->permission_id == Permission::IS_OPERATOR
            || $detailPeminjaman->peminjaman->peminjam_id == $user->id
            && $detailPeminjaman->peminjaman->status == 'pengajuan';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param DetailPeminjaman $detailPeminjaman
     * @return bool
     */
    public function restore(User $user, DetailPeminjaman $detailPeminjaman): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param DetailPeminjaman $detailPeminjaman
     * @return bool
     */
    public function forceDelete(User $user, DetailPeminjaman $detailPeminjaman): bool
    {
        return false;
    }
}
