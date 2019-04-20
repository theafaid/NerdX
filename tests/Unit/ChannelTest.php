<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChannelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_belongs_to_a_user()
    {
        $channel = factory('App\Channel')->create();

        $this->assertInstanceOf('App\User', $channel->owner);
    }
}
