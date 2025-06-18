<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class WelcomeUser extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $user
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bem-vindo ao ' . config('app.name', 'Dinamk Tech') . '!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome-user',
            with: [
                'user' => $this->user,
            ],
        );
    }
}
