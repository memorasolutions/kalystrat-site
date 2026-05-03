<?php

namespace Modules\Frontend\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CandidatureMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public array $data) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Candidature Kalystrat – {$this->data['metier']}",
            replyTo: [$this->data['courriel']],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'frontend::emails.candidature', with: $this->data);
    }
}
