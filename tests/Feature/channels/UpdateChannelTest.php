<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateChannelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function channel_owner_can_see_edit_channel_page()
    {
        $this->signIn();

        $channel = create('App\Channel', ['user_id' => auth()->id()]);

        $this->get(route('user.channels.edit', [auth()->user()->username, $channel->slug]))
            ->assertStatus(200)
            ->assertViewIs('user.channels.edit')
            ->assertViewHas('channel');
    }

    /** @test */
    function channel_owner_can_update_it()
    {
        $this->signIn();

        $channel = create('App\Channel', ['user_id' => auth()->id()]);

        $newChannel = make('App\Channel');

        $this->withoutExceptionHandling();

        $this->patch(route('user.channels.update', [auth()->user()->username, $channel->slug]), $newChannel->toArray())
            ->assertStatus(200)
            ->assertJson(['redirectUrl' => route('user.channels.show', [auth()->user()->username, $newChannel->slug])]);


    }
}
