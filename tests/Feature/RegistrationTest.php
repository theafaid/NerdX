<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function unique_username_and_a_profile_must_generated_automatically_when_registration()
    {
        $this->assertNull(auth()->user());

        $this->post(route('register'), [
            'name'                  => 'john doe',
            'email'                 => 'john@yahoo.com',
            'password'              => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertNotNull(auth()->user());
        $this->assertEquals(auth()->user()->username, 'JohnDoe');
        $this->assertNotNull(auth()->user()->profile());
    }

    /** @test */
    function a_user_require_a_unique_username(){
        $user = create('App\User', ['name' => 'john doe']);

        $this->assertEquals($user->fresh()->username, 'JohnDoe');

        $user2 = create('App\User', ['name' => $user->name]);

        $this->assertEquals($user2->fresh()->username, "JohnDoe{$user2->id}");
    }
}
