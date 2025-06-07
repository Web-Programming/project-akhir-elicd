<?php

namespace App\Policies;

use App\Models\Pengembalian;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PengembalianPolicy
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
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return mixed
     */
    public function view(User $user, Pengembalian $pengembalian)
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
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return mixed
     */
    public function update(User $user, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return mixed
     */
    public function delete(User $user, Pengembalian $pengembalian)
    {
        return in_array($user->email,[
            'handikacastello39@mhs.mdp.ac.id'
        ]);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return mixed
     */
    public function restore(User $user, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return mixed
     */
    public function forceDelete(User $user, Pengembalian $pengembalian)
    {
        //
    }
}
