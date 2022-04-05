<?php

namespace App\Listeners\Auth;

use App\Events\RegenerateOtpCode;
use App\Mail\OtpRegenerateMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RegenerateOtpCodeToUser implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegenerateOtpCode  $event
     * @return void
     */
    public function handle(RegenerateOtpCode $event)
    {
        Mail::to($event->user->email)->send(new OtpRegenerateMail($event->user));
    }
}
