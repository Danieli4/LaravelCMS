<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Bb;

class BbPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Access control for update ads
     * Comparison of the user's key with the key of the ad author
     * @param User $user
     * @param Bb $bb
     * @return bool
     */

    public function update (User $user, Bb $bb){
        return $bb->user->id === $user->id;
    }

    /**
     * Access control delete ads
     * This method call method "update"
     * @param User $user
     * @param Bb $bb
     * @return bool
     */

    public function destroy (User $user, Bb $bb){
        return $this->update($user, $bb);
    }
}
