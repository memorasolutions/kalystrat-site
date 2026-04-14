<?php

/**
 * @author  MEMORA solutions <info@memora.ca> (https://memora.solutions)
 *
 * @project memora/laravel-saas-boilerplate
 */

declare(strict_types=1);

namespace Modules\AI\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChatbotDigestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly array $stats) {}

    public function envelope(): Envelope
    {
        $appName = config('app.name', 'App');
        $date = now()->format('Y-m-d');

        return new Envelope(
            subject: "{$appName} - digest conversations {$date}",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'ai::emails.chatbot-digest',
            with: ['stats' => $this->stats],
        );
    }
}
