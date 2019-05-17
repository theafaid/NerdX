<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateChannelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function channel_owner_can_update_it()
    {
        $this->signIn();

        $channel = create('App\Channel', ['user_id' => auth()->id()]);

        $newChannel = make('App\Channel');

        $this->withoutExceptionHandling();

        $this->patch(route('channels.update', $channel->slug), $newChannel->toArray())
            ->assertStatus(200)
            ->assertJson(['redirectUrl' => route('channels.show', $newChannel->slug)]);


    }
}
