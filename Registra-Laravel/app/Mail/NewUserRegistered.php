<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;  
    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user;  
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New registered user',
        );
    }

    /**
     * Get the message content definition.
     */
public function content(): Content
{
    return new Content(
        view: 'emails.new_user', 
        with: [
            'user' => $this->user,
        ],
    );
}


    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
