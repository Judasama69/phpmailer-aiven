<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class SampleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $senderEmail;

    public function __construct($content, $senderEmail = null)
    {
        $this->content = $content;
        $this->senderEmail = $senderEmail;
    }

    public function envelope(): Envelope
    {
        $replyTo = [];

        if (!empty($this->senderEmail)) {
            $replyTo = [new Address($this->senderEmail)];
        }

        return new Envelope(
            replyTo: $replyTo,
            subject: 'Message from ' . ($this->senderEmail ?? 'Unknown')
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.sample',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
