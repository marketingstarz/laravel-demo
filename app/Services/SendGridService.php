<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SendGridService
{
    public function send(array $payload): array
    {
        $resp = Http::withToken(config('services.sendgrid.key'))
            ->acceptJson()
            ->post('https://api.sendgrid.com/v3/mail/send', $payload);

        return [
            'ok' => $resp->successful(),
            'status' => $resp->status(),
            'body' => $resp->json(),
            'headers' => $resp->headers(),
        ];
    }
}
