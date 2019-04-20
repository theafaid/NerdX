<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Sign in a user 
     * @return $this
     */
    public function signIn()
    {
        $user = create('App\User');

        $this->actingAs($user);

        return $this;
    }
}
