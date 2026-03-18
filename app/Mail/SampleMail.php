<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SampleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $senderEmail;

    public function __construct($content, $senderEmail)
    {
        $this->content = $content;
        $this->senderEmail = $senderEmail;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [
                new \Illuminate\Mail\Mailables\Address($this->senderEmail)
            ],
            subject: 'Message from ' . $this->senderEmail
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

