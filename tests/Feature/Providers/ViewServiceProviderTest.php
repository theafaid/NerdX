<?php

namespace Tests\Feature\Providers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewServiceProviderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function all_views_must_have_authenticated_user_variable()
    {
       $this->signIn();

        $this->get(route('home'))
            ->assertViewHas('authUser');
    }
}
