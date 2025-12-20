<?php

namespace App\Notifications\Channels;

use App\Services\SendGridService;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class SendGridChannel
{
    public function __construct(private SendGridService $sendgrid) {}

    public function send($notifiable, Notification $notification): void
    {
        if (!method_exists($notification, 'toSendGrid')) {
            return;
        }

        $payload = $notification->toSendGrid($notifiable);

        $result = $this->sendgrid->send($payload);

        Log::info('sendgrid.send', [
            'ok' => $result['ok'],
            'status' => $result['status'],
            'body' => $result['body'],
        ]);

        if (!$result['ok']) {
            throw new \RuntimeException("SendGrid API failed: {$result['status']}");
        }
    }
}
