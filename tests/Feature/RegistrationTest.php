<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function profile_for_a_user_will_created_after_registration()
    {
        $this->assertNull(auth()->user());

        $this->post(route('register'), [
            'name'                  => 'John Doe',
            'email'                 => 'john@yahool.com',
            'password'              => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertNotNull(auth()->user());
        $this->assertNotNull(auth()->user()->profile());
    }

}
