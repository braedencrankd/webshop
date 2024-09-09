<?php

namespace App\Listeners;

use App\Actions\Webshop\HandleCheckoutSessionCompleted;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'checkout.session.completed') {
            // Handle the eventdashboard
            (new HandleCheckoutSessionCompleted())->handle($event->payload['data']['object']['id']);
        }
    }
}
