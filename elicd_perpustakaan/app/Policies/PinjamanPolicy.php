<?php

namespace App\Policies;

use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PinjamanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return mixed
     */
    public function view(User $user, Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->email === 'handikacastello39@mhs.mdp.ac.id';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return mixed
     */
    public function update(User $user, Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return mixed
     */
    public function delete(User $user, Pinjaman $pinjaman)
    {
        return in_array($user->email,[
            'handikacastello39@mhs.mdp.ac.id'
        ]);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return mixed
     */
    public function restore(User $user, Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return mixed
     */
    public function forceDelete(User $user, Pinjaman $pinjaman)
    {
        //
    }
}
