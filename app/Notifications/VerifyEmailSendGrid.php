<?php

namespace App\Notifications;

use App\Notifications\Channels\SendGridChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;

class VerifyEmailSendGrid extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private string $verificationUrl) {}

    public function via($notifiable): array
    {
        return [SendGridChannel::class];
    }

    public function toSendGrid($notifiable): array
    {
        $fromEmail = config('services.sendgrid.from_email');
        $fromName  = config('services.sendgrid.from_name');

        $toEmail = $notifiable->email;
        $toName  = $notifiable->name ?? $toEmail;

        $url = $this->verificationUrl;

        $html = <<<HTML
    <p>Click the button below to verify your email address.</p>
    <p><a href="{$url}" style="display:inline-block;padding:10px 14px;text-decoration:none;border-radius:6px;border:1px solid #111;">Verify Email</a></p>
    <p>If you did not create an account, you can ignore this email.</p>
    HTML;

        return [
            'personalizations' => [[
                'to' => [[
                    'email' => $toEmail,
                    'name' => $toName,
                ]],
                'subject' => 'Verify your email address',
            ]],
            'from' => [
                'email' => $fromEmail,
                'name' => $fromName,
            ],

            // Disable tracking so SendGrid doesn’t rewrite the link
            'tracking_settings' => [
                'click_tracking' => [
                    'enable' => false,
                    'enable_text' => false,
                ],
            ],

            'content' => [[
                'type' => 'text/html',
                'value' => $html,
            ]],
        ];
    }

}
