<?php

namespace Tests\Unit;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_as_a_profile()
    {
        $user = create('App\User');

        $this->assertInstanceOf('App\Profile', $user->profile);
    }

    /** @test */
    function a_user_has_many_channels()
    {
        $user = create('App\User');

        $this->assertInstanceOf(Collection::class, $user->channels);
    }

    /** @test */
    function can_check_if_user_is_own_an_object()
    {
        $this->signIn();

        $user = auth()->user();
        $channelOwnedByUser = create('App\Channel', ['user_id' => $user->id]);
        $channelNotOwnedByUser = create('App\Channel');

        $this->assertTrue($user->owns($channelOwnedByUser));
        $this->assertFalse($user->owns($channelNotOwnedByUser));
    }
}
