<?php

namespace Tests\Feature\Channels;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowChannelTest extends TestCase
{

    use RefreshDatabase;


    /** @test */
    function authenticated_and_un_authenticated_users_can_view_a_channel(){

        $this->testShow();

        $this->signIn();

        $this->testShow();

    }

    function testShow(){
        $channel = create('App\Channel');

        $response = $this->get(route('channels.show',  $channel->slug));

        $response->assertStatus(200);

        $response->assertSee($channel->name);
    }

}
