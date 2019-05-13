<?php

namespace Tests\Feature\Channels;

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

        $this->get(route('user.channels.create', auth()->user()->username))
            ->assertStatus(200)
            ->assertViewIs('user.channels.create');
    }

    /** @test */
    function an_authenticated_user_can_create_a_channel()
    {
        $this->signIn();

        $user = auth()->user();

        $channel = make('App\Channel');

        $this->postJson(route('user.channels.store', auth()->user()->name), $channel->toArray())
            ->assertJson(['redirectUrl' => route('user.channels.show', [$user->username, $channel->slug])]);

        $this->assertNotNull($user->fresh()->channels);

        $this->assertDatabaseHas('channels', ['slug' => $channel->slug]);

        $this->assertEquals($user->id, Channel::first()->user_id);
    }
}
