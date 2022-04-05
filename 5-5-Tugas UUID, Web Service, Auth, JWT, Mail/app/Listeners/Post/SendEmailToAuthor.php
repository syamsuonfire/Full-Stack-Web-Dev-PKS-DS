<?php

namespace App\Listeners\Post;

use App\Events\PostCreated;
use App\Mail\PostCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToAuthor implements ShouldQueue
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
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        //dd($event->post->user->email);
        Mail::to($event->post->user->email)->send(new PostCreatedMail($event->post));
    }
}
