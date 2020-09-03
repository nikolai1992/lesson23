<?php

namespace App\Listeners;

use App\Events\onAddSubjectEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
class AddSubjectsListener
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
     * @param  onAddSubjectEvent  $event
     * @return void
     */
    public function handle(onAddSubjectEvent $event)
    {
        //
//        Log::info('Subject saved in db', [$event->user_name=>$event->subject_name]);
    }
}
