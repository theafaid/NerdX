<?php

namespace Tests\Feature;

use App\Channel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateChannelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_authenticated_user_can_see_create_channel_form()
    {
        $this->signIn();

        $this->get(route('channels.create'))
            ->assertStatus(200)
            ->assertViewIs('channels.create');
    }

    /** @test */
    function an_authenticated_user_can_create_a_channel()
    {
        $this->signIn();

        $user = auth()->user();

        $channel = make('App\Channel');

        $this->post(route('channels.store'), $channel->toArray())
                ->assertRedirect(route('channels.show', $channel->slug));

        $this->assertNotNull($user->fresh()->channels);

        $this->assertDatabaseHas('channels', ['slug' => $channel->slug]);

        $this->assertEquals($user->id, Channel::first()->user_id);
    }
}
