<?php

namespace App\Listeners;

use App\Models\MUser;
use Illuminate\Auth\Events\Login;

class UpdateLoginDate
{
    public function handle(Login $event): void
    {
        if (! $event->user instanceof MUser) {
            return;
        }

        $event->user->forceFill([
            'date_login' => now(),
        ])->save();
    }
}
