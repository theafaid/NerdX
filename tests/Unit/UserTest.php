<?php

namespace Tests\Unit;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_has_many_channels(){
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->channels);
    }
}
