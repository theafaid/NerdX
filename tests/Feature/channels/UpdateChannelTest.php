<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateChannelTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->channel    = create('App\Channel');
        $this->newChannel = make('App\Channel');
    }

    /** @test */
    function un_authenticated_user_cannot_update_any_channel(){
        $this->patch(
            route('channels.update', $this->channel->slug),
            $this->newChannel->toArray()
        )->assertRedirect(route('login'));
    }

    /** @test */
    function a_user_who_not_owns_the_channel_cannot_update_it(){
        $this->signIn();

        $this->patch(
            route('channels.update', $this->channel->slug),
            $this->newChannel->toArray()
        )->assertStatus(403);
    }

    /** @test */
    function channel_owner_can_update_it()
    {

        Storage::fake();

        $this->signIn();

        $this->channel->update(['user_id' => auth()->id()]);

        $this->newChannel['logo']       = UploadedFile::fake()->image('logo.jpg');
        $this->newChannel['background'] = UploadedFile::fake()->image('background.jpg');

        $this->withoutExceptionHandling();

        $this->patch(
            route('channels.update', $this->channel->slug),
            $this->newChannel->toArray()
        )->assertStatus(200);

        $this->assertDatabaseMissing('channels', ['name' => $this->channel->name]);
        $this->assertDatabaseHas('channels', ['name' => $this->newChannel->name]);

        $this->assertTrue(Storage::exists("channels/{$this->newChannel->slug}_logo.jpg"));
        $this->assertTrue(Storage::exists("channels/{$this->newChannel->slug}_background.jpg"));
    }
}
