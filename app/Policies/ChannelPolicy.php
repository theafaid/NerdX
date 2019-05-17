<?php

namespace App\Policies;

use App\User;
use App\Channel;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChannelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the channel.
     *
     * @param  \App\User  $user
     * @param  \App\Channel  $channel
     * @return mixed
     */
    public function view(User $user, Channel $channel)
    {
        //
    }

    /**
     * Determine whether the user can create channels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the channel.
     *
     * @param  \App\User  $user
     * @param  \App\Channel  $channel
     * @return mixed
     */
    public function update(User $user, Channel $channel)
    {
        return $user->owns($channel);
    }

    /**
     * Determine whether the user can delete the channel.
     *
     * @param  \App\User  $user
     * @param  \App\Channel  $channel
     * @return mixed
     */
    public function delete(User $user, Channel $channel)
    {
        //
    }

    /**
     * Determine whether the user can restore the channel.
     *
     * @param  \App\User  $user
     * @param  \App\Channel  $channel
     * @return mixed
     */
    public function restore(User $user, Channel $channel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the channel.
     *
     * @param  \App\User  $user
     * @param  \App\Channel  $channel
     * @return mixed
     */
    public function forceDelete(User $user, Channel $channel)
    {
        //
    }
}
