<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        try {
            Mail::to($event->user)->queue(new WelcomeUser($event->user));
        } catch (\Throwable $e) {
            Log::error('Erro ao enviar e-mail de boas-vindas', [
                'user_id' => $event->user->id,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
