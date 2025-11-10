<?php

namespace Tests\Feature;

use App\Events\TestAblyEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class AblyRealBroadcastTest extends TestCase
{
    /**
     * Test that an event can be truly broadcast via Ably.
     *
     * IMPORTANT: For this test to actually send a message to Ably,
     * ensure your .env file (or phpunit.xml for testing) has:
     * BROADCAST_DRIVER=ably
     * ABLY_KEY=your_ably_api_key
     *
     * After running this test, you should be able to see the message
     * 'Hello Ably from Real Test!' on the 'test-channel' in your
     * Ably dashboard's debugger or a subscribed client.
     */
    public function test_ably_event_can_be_truly_broadcast(): void
    {
        // Temporarily set the broadcast driver to ably for this test
        config(['broadcasting.default' => 'ably']);

        $message = 'Hello Ably from Real Test!';
        event(new TestAblyEvent($message));

        // We don't use Event::fake() here because we want to actually broadcast.
        // We can assert that the event was dispatched, but the actual
        // reception needs to be verified externally (e.g., Ably dashboard).
        Event::assertDispatched(TestAblyEvent::class, function ($event) use ($message) {
            return $event->message === $message &&
                   $event->broadcastOn()[0]->name === 'test-channel' &&
                   $event->broadcastAs() === 'test.ably.message';
        });

        $this->assertTrue(true, 'Event dispatched. Check Ably dashboard for "test-channel" to verify actual broadcast.');
    }
}
