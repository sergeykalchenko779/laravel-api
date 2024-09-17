<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Support\Facades\Log;

class SubmissionListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(SubmissionSaved $event): void
    {
        Log::info('Entity with name=' . $event->dto->name . ' and email=' . $event->dto->email . ' was created');
    }
}
