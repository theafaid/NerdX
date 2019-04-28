<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateChannelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_authenticated_user_can_see_edit_channel_page()
    {
        $this->signIn();

        $channel = create('App\Channel', ['user_id' => auth()->id()]);

        $this->get(route('user.channels.edit', [auth()->user()->username, $channel->slug]))
            ->assertStatus(200)
            ->assertViewIs('user.channels.edit')
            ->assertViewHas('channel');
    }
}
