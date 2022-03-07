<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\StatusCallbackWebhookConnection;
use Log;

class StatusCallbackWebhook implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Log::info($event->request);

        $connection = new StatusCallbackWebhookConnection($event->request['webhookUrl']);

        $payload = [
                    'SmsSid'=> $event->message['sid'],
                    'SmsStatus'=> $event->message['status'],
                    'MessageStatus'=> $event->message['status'],
                    'To'=> $event->message['phone'],
                    'MessageSid'=> $event->message['sid'],
                    'AccountSid'=> 'ACxxxxxxx',
                    'From'=> 'TwilioMock',
                    'ApiVersion'=> '2010-04-01'
                    ];

        $connection->post($payload);

    }
}
